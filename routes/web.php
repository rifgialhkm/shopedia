<?php

use App\Http\Livewire\AddProduct;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\ChooseCourier;
use App\Http\Livewire\Home;
use App\Http\Livewire\PayOrder;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('home', function() {
//     return view('home');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', Home::class);
Route::get('/tambah', AddProduct::class)->name('addProduct');
Route::get('/checkout', Checkout::class)->name('checkout');
Route::get('/pilih-kurir', ChooseCourier::class)->name('pilihKurir');
Route::get('/bayar/{id}', PayOrder::class)->name('bayar');
