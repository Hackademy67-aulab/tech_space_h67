<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ShopController;
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
Route::get('/edit-product/{product}', [ProductController::class, 'edit'])->name('editProduct');
Route::put('/update-product/{product}', [ProductController::class, 'update'])->name('updateProduct');
Route::delete('/delete-product/{product}', [ProductController::class, 'destroy'])->name('deleteProduct');

//Rotte di gestione dei negozi
Route::get('/create-shop', [ShopController::class, 'create'])->name('createShop');
Route::post('/store-shop', [ShopController::class, 'store'])->name('storeShop');
Route::get('/index-shop', [ShopController::class, 'index'])->name('indexShop');
Route::get('/show-shop/{shop}', [ShopController::class, 'show'])->name('showShop');
Route::get('/edit-shop/{shop}', [ShopController::class, 'edit'])->name('editShop');
Route::put('/update-shop/{shop}', [ShopController::class, 'update'])->name('updateShop');
Route::delete('/delete-shop/{shop}', [ShopController::class, 'destroy'])->name('deleteShop');

//Rotte per profilo utente
Route::get('/user-profile',[PublicController::class, 'userProfile'])->name('userProfile');
Route::delete('/user-delete', [PublicController::class, 'destroy'])->name('deleteUser');

