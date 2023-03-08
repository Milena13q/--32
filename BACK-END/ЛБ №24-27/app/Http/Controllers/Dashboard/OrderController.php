<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Order\StoreRequest;
use App\Http\Requests\Dashboard\Order\UpdateRequest;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $response = Order::query()
            ->filter(array_filter($request->all(), fn($res) => !empty($res)))
            ->paginate(10);

        return view('dashboard.order.index', compact('response'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $clients = User::query()
            ->where('role_id', '=', RoleEnum::CLIENT->value)
            ->select(['id', 'first_name', 'last_name'])
            ->toBase()
            ->get();

        $products = Product::query()
            ->toBase()
            ->get();

        return view('dashboard.order.create', compact('clients', 'products'));
    }

    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        try {
            /** @var Order $order */
            $order = Order::query()
                ->create($request->validated());

            $products = Product::query()
                ->whereIn('id', $request->get('products', []))
                ->toBase()
                ->get();

            foreach ($products as $product) {
                OrderItem::query()
                    ->create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'price' => $product->price
                    ]);
            }

            if($request->has('client_id') && !empty($request->get('client_id'))) {
                $client = User::query()
                    ->find($request->get('client_id'));

                if($client instanceof User) {
                    Mail::to($client->email)
                        ->send(new OrderMail($order));
                }
            }

            return redirect()
                ->route('dashboard.order.index')
                ->with('success', 'Заказ успешно создан!');
        } catch (\Exception $e) {
            report($e);

            return redirect()
                ->route('dashboard.order.create')
                ->withInput()
                ->withErrors([
                    'address' => $e instanceof \InvalidArgumentException
                        ? $e->getMessage()
                        : 'Произошла ошибка, попробуйте позже'
                ]);
        }
    }

    /**
     * @param int $id
     * @return View|RedirectResponse
     */
    public function view(int $id): View|RedirectResponse
    {
        try {
            $response = Order::query()
                ->with('orderItems')
                ->find($id);

            return view('dashboard.order.view', compact('response'));
        } catch (\Exception $e) {
            report($e);

            return redirect()
                ->route('dashboard.order.index');
        }
    }

    /**
     * @param int $id
     * @return View|RedirectResponse
     */
    public function edit(int $id): View|RedirectResponse
    {
        try {
            $response = Order::query()
                ->with('orderItems')
                ->find($id);

            $clients = User::query()
                ->where('role_id', '=', RoleEnum::CLIENT->value)
                ->select(['id', 'first_name', 'last_name'])
                ->toBase()
                ->get();

            $products = Product::query()
                ->toBase()
                ->get();

            return view('dashboard.order.edit', compact('response', 'clients', 'products'));
        } catch (\Exception $e) {
            report($e);

            return redirect()
                ->route('dashboard.order.index');
        }
    }

    /**
     * @param UpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, int $id): RedirectResponse
    {
        try {
            Order::query()
                ->where('id', '=', $id)
                ->update($request->validated());

            OrderItem::query()
                ->where('order_id', '=', $id)
                ->delete();

            $products = Product::query()
                ->whereIn('id', $request->get('products', []))
                ->toBase()
                ->get();

            foreach ($products as $product) {
                OrderItem::query()
                    ->create([
                        'order_id' => $id,
                        'product_id' => $product->id,
                        'price' => $product->price
                    ]);
            }

            return redirect()
                ->route('dashboard.order.index')
                ->with('success', 'Заказ успешно обновлен!');
        } catch (\Exception $e) {
            report($e);

            return redirect()
                ->route('dashboard.order.update', ['id' => $id])
                ->withInput()
                ->withErrors([
                    'address' => $e instanceof \InvalidArgumentException
                        ? $e->getMessage()
                        : 'Произошла ошибка, попробуйте позже'
                ]);
        }
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        Order::destroy($id);

        return redirect()
            ->route('dashboard.order.index')
            ->with('success', 'Заказ успешно удален!');
    }
}
