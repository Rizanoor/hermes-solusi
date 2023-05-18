<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/details/{id}', [App\Http\Controllers\DetailController::class, 'index'])->name('detail');
Route::post('/details/{id}', [App\Http\Controllers\DetailController::class, 'add'])->name('detail-add');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
    Route::delete('/cart/{id}', [App\Http\Controllers\CartController::class, 'delete'])->name('cart-delete');

    Route::post('/checkout', [App\Http\Controllers\CheckoutController::class, 'process'])->name('checkout');

    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
      ->name('dashboard');

});


Route::prefix('admin')
//   ->namespace('Admin')
//   ->middleware(['auth', 'admin'])
  ->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
      ->name('admin-dashboard');
    Route::resource('user', App\Http\Controllers\Admin\UserController::class);
    Route::resource('product', App\Http\Controllers\Admin\ProductController::class);
    Route::resource('product-gallery',  App\Http\Controllers\Admin\ProductGalleryController::class);
    Route::resource('transaction',  App\Http\Controllers\Admin\TransactionController::class);
  });
Auth::routes();
