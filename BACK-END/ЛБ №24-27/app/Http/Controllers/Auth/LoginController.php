<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * @return View|RedirectResponse
     */
    public function index(): View|RedirectResponse
    {
        if(Auth::check()) {
            return redirect()
                ->route('dashboard.index');
        }

        return view('auth.login');
    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        try {
            if(!Auth::attempt($request->validated())) {
                throw new \InvalidArgumentException('Не верные данные');
            }

            return redirect()
                ->route('dashboard.index');
        } catch (\Exception $e) {
            report($e);

            return redirect()
                ->route('auth.login')
                ->withInput()
                ->withErrors([
                    'email' => $e instanceof \InvalidArgumentException
                        ? $e->getMessage()
                        : 'Произошла ошибка, попробуйте позже'
                ]);
        }
    }
}
