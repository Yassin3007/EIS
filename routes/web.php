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
Route::get('/product_details/{id}', [App\Http\Controllers\Site\ProductController::class, 'product_details'])->name('product_details');
