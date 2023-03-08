<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Product\StoreRequest;
use App\Http\Requests\Dashboard\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $response = Product::query()
            ->filter(array_filter($request->all(), fn($res) => !empty($res)))
            ->paginate(10);

        return view('dashboard.product.index', compact('response'));
    }

    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        try {
            Product::query()
                ->create($request->validated());

            return redirect()
                ->route('dashboard.product.index')
                ->with('success', 'Услуга успешно добавлена!');
        } catch (\Exception $e) {
            report($e);

            return redirect()
                ->route('dashboard.product.create')
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
            $response = Product::query()
                ->find($id);

            return view('dashboard.product.view', compact('response'));
        } catch (\Exception $e) {
            report($e);

            return redirect()
                ->route('dashboard.product.index');
        }
    }

    /**
     * @param int $id
     * @return View|RedirectResponse
     */
    public function edit(int $id): View|RedirectResponse
    {
        try {
            $response = Product::query()
                ->find($id);

            return view('dashboard.product.edit', compact('response'));
        } catch (\Exception $e) {
            report($e);

            return redirect()
                ->route('dashboard.product.index');
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
            Product::query()
                ->where('id', '=', $id)
                ->update($request->validated());

            return redirect()
                ->route('dashboard.product.index')
                ->with('success', 'Услуга успешно обновлена!');
        } catch (\Exception $e) {
            report($e);

            return redirect()
                ->route('dashboard.product.update', ['id' => $id])
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
        Product::destroy($id);

        return redirect()
            ->route('dashboard.product.index')
            ->with('success', 'Услуга успешно удалена!');
    }
}
