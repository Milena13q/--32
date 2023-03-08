<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'index'])->name('auth.login');
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'store'])->name('auth.login.handle');
Route::get('/logout', [\App\Http\Controllers\Auth\LogoutController::class, '__invoke'])->name('auth.logout');

Route::prefix('dashboard')
    ->middleware('auth:web')
    ->group(function () {
        Route::view('/', 'dashboard.index')->name('dashboard.index');

        Route::prefix('client')
            ->group(function () {
                Route::get('/', [\App\Http\Controllers\Dashboard\ClientController::class, 'index'])
                    ->name('dashboard.client.index');

                Route::view('/create', 'dashboard.client.create')->name('dashboard.client.create');
                Route::post('/create', [\App\Http\Controllers\Dashboard\ClientController::class, 'store'])
                    ->name('dashboard.client.store');

                Route::get('/{id}', [\App\Http\Controllers\Dashboard\ClientController::class, 'view'])
                    ->name('dashboard.client.view');

                Route::get('/edit/{id}', [\App\Http\Controllers\Dashboard\ClientController::class, 'edit'])
                    ->name('dashboard.client.edit');

                Route::post('/edit/{id}', [\App\Http\Controllers\Dashboard\ClientController::class, 'update'])
                    ->name('dashboard.client.update');

                Route::get('/destroy/{id}', [\App\Http\Controllers\Dashboard\ClientController::class, 'destroy'])
                    ->name('dashboard.client.destroy');
            });

        Route::prefix('developer')
            ->group(function () {
                Route::get('/', [\App\Http\Controllers\Dashboard\DeveloperController::class, 'index'])
                    ->name('dashboard.developer.index');

                Route::view('/create', 'dashboard.developer.create')->name('dashboard.developer.create');
                Route::post('/create', [\App\Http\Controllers\Dashboard\DeveloperController::class, 'store'])
                    ->name('dashboard.developer.store');

                Route::get('/{id}', [\App\Http\Controllers\Dashboard\DeveloperController::class, 'view'])
                    ->name('dashboard.developer.view');

                Route::get('/edit/{id}', [\App\Http\Controllers\Dashboard\DeveloperController::class, 'edit'])
                    ->name('dashboard.developer.edit');

                Route::post('/edit/{id}', [\App\Http\Controllers\Dashboard\DeveloperController::class, 'update'])
                    ->name('dashboard.developer.update');

                Route::get('/destroy/{id}', [\App\Http\Controllers\Dashboard\DeveloperController::class, 'destroy'])
                    ->name('dashboard.developer.destroy');
            });

        Route::prefix('product')
            ->group(function () {
                Route::get('/', [\App\Http\Controllers\Dashboard\ProductController::class, 'index'])
                    ->name('dashboard.product.index');

                Route::view('/create', 'dashboard.product.create')->name('dashboard.product.create');
                Route::post('/create', [\App\Http\Controllers\Dashboard\ProductController::class, 'store'])
                    ->name('dashboard.product.store');

                Route::get('/{id}', [\App\Http\Controllers\Dashboard\ProductController::class, 'view'])
                    ->name('dashboard.product.view');

                Route::get('/edit/{id}', [\App\Http\Controllers\Dashboard\ProductController::class, 'edit'])
                    ->name('dashboard.product.edit');

                Route::post('/edit/{id}', [\App\Http\Controllers\Dashboard\ProductController::class, 'update'])
                    ->name('dashboard.product.update');

                Route::get('/destroy/{id}', [\App\Http\Controllers\Dashboard\ProductController::class, 'destroy'])
                    ->name('dashboard.product.destroy');
            });

        Route::prefix('order')
            ->group(function () {
                Route::get('/', [\App\Http\Controllers\Dashboard\OrderController::class, 'index'])
                    ->name('dashboard.order.index');

                Route::get('/create', [\App\Http\Controllers\Dashboard\OrderController::class, 'create'])
                    ->name('dashboard.order.create');

                Route::post('/create', [\App\Http\Controllers\Dashboard\OrderController::class, 'store'])
                    ->name('dashboard.order.store');

                Route::get('/{id}', [\App\Http\Controllers\Dashboard\OrderController::class, 'view'])
                    ->name('dashboard.order.view');

                Route::get('/edit/{id}', [\App\Http\Controllers\Dashboard\OrderController::class, 'edit'])
                    ->name('dashboard.order.edit');

                Route::post('/edit/{id}', [\App\Http\Controllers\Dashboard\OrderController::class, 'update'])
                    ->name('dashboard.order.update');

                Route::get('/destroy/{id}', [\App\Http\Controllers\Dashboard\OrderController::class, 'destroy'])
                    ->name('dashboard.order.destroy');

                Route::get('/export/{id}', [\App\Http\Controllers\Dashboard\ExportOrderController::class, '__invoke'])
                    ->name('dashboard.order.export');
            });
    });
