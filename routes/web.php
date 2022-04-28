<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {
    return view('welcome');
})->middleware(['verify.shopify'])->name('home');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/get-all-products', [App\Http\Controllers\TestController::class, 'index']);

Route::get('/count-products', [App\Http\Controllers\TestController::class, 'countProducts']);

Route::get('/get-products-saved-search', [App\Http\Controllers\TestController::class, 'getProductSavedSearch']);

Route::get('/product-with-pageinfo', [App\Http\Controllers\TestController::class, 'getProductWithPageInfo']);

Route::get('/product-create', [App\Http\Controllers\TestController::class, 'createProduct']);

