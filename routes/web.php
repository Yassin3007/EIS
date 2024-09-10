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

Route::get('/ffff', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\Site\HomeController::class, 'index'])->name('index');
Route::get('/contact', [App\Http\Controllers\Site\HomeController::class, 'contactUsPage'])->name('contact');
Route::post('/contact', [App\Http\Controllers\Site\HomeController::class, 'storeContactUS'])->name('storeContactUS');
Route::get('/product_details/{id}', [App\Http\Controllers\Site\ProductController::class, 'product_details'])->name('product_details');
Route::get('/allArticles', [App\Http\Controllers\Site\NewsController::class, 'allArticles'])->name('allArticles');
Route::get('/article_details/{id}', [App\Http\Controllers\Site\NewsController::class, 'article_details'])->name('article_details');
Route::get('/shop', [App\Http\Controllers\Site\ShopController::class, 'shop'])->name('shop');
Route::get('/category_products/{id}', [App\Http\Controllers\Site\ShopController::class, 'category_products'])->name('category_products');
