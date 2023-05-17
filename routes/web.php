<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;

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

Route::group(['middleware' => ['auth']], function () {
    // Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
    //   ->name('dashboard');

});


Route::prefix('admin')
//   ->namespace('Admin')
//   ->middleware(['auth', 'admin'])
  ->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
      ->name('admin-dashboard');
    Route::resource('user', 'UserController');
    Route::resource('product', 'ProductController');
    Route::resource('product-gallery', 'ProductGalleryController');
    Route::resource('transaction', 'TransactionController');
  });
Auth::routes();
