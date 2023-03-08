<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Developer\StoreRequest;
use App\Http\Requests\Dashboard\Developer\UpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DeveloperController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $response = User::query()
            ->where('role_id', '=', RoleEnum::DEVELOPER->value)
            ->filter(array_filter($request->all(), fn($res) => !empty($res)))
            ->paginate(10);

        return view('dashboard.developer.index', compact('response'));
    }

    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        try {
            User::query()
                ->create($request->validated());

            return redirect()
                ->route('dashboard.developer.index')
                ->with('success', 'Разработчик успешно добавлен!');
        } catch (\Exception $e) {
            report($e);

            return redirect()
                ->route('dashboard.developer.create')
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
            $response = User::query()
                ->find($id);

            return view('dashboard.developer.view', compact('response'));
        } catch (\Exception $e) {
            report($e);

            return redirect()
                ->route('dashboard.developer.index');
        }
    }

    /**
     * @param int $id
     * @return View|RedirectResponse
     */
    public function edit(int $id): View|RedirectResponse
    {
        try {
            $response = User::query()
                ->find($id);

            return view('dashboard.developer.edit', compact('response'));
        } catch (\Exception $e) {
            report($e);

            return redirect()
                ->route('dashboard.developer.index');
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
            User::query()
                ->where('id', '=', $id)
                ->update($request->validated());

            return redirect()
                ->route('dashboard.developer.index')
                ->with('success', 'Разработчик успешно обновлен!');
        } catch (\Exception $e) {
            report($e);

            return redirect()
                ->route('dashboard.developer.update', ['id' => $id])
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
        User::destroy($id);

        return redirect()
            ->route('dashboard.developer.index')
            ->with('success', 'Разработчик успешно удален!');
    }
}
