<?php

use App\Http\Livewire\Carrito;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\ProductDetail;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ProductList;

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
    return view('index');
})->name('/');

Route::get('/listProducto', ProductList::class)->name('product-list');
Route::get('/detalleProducto/{product}', ProductDetail::class)->name('product-detail');
Route::middleware(['auth:sanctum', 'verified'])->get('/carrito',Carrito::class)->name('cart');
Route::middleware(['auth:sanctum', 'verified'])->get('/facture',Checkout::class)->name('checkout');
Route::get('/listaDeseo', function () {
    return view('wishlist');
})->name('wishlist');

Route::get('/contacto', function () {
    return view('contact');
})->name('contact');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/Cuenta', function () {
    return view('my-account');
})->name('my-account');

