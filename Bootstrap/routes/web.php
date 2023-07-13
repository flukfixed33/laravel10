<?php

use App\Http\Controllers\ProductController;
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

Route::get('index', function () {
    return view('products.index');
});
Route::get('create', function () {
    return view('products.create');
});

Auth::routes();
Route::resource('product',ProductController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
