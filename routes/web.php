<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublicController;
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

Route::get('/', [PublicController::class, 'home'])->name('homePage');

//Rotte di gestione dei prodotti
Route::get('/create-product', [ProductController::class, 'create'])->name('createProduct');
Route::post('/store-product', [ProductController::class, 'store'])->name('storeProduct');
Route::get('/index-product', [ProductController::class, 'index'])->name('indexProduct');
Route::get('/show-product/{product}', [ProductController::class, 'show'])->name('showProduct');

