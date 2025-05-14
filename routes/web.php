<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthController; 
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\ShopController;

Route::get('/', function () {
    return view('welcome');
});
 
Route::get('login', [AuthController::class, 'index'])->name('login'); 
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');  
Route::get('registration', [AuthController::class, 'registration'])->name('register'); 
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');  
Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth')->name('dashboard');  
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/')->with('success', 'Déconnecté avec succès.');
})->name('logout');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('products', ProductController::class);
});
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
});
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('orders', [\App\Http\Controllers\Admin\OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/{id}', [\App\Http\Controllers\Admin\OrderController::class, 'show'])->name('orders.show');
    Route::get('orders/{id}/pdf', [\App\Http\Controllers\Admin\OrderController::class, 'generatePdf'])->name('orders.pdf'); 
});

Route::get('/', [ShopController::class, 'index'])->name('home');
//Route::get('/add-to-cart/{id}', [ShopController::class, 'addToCart'])->name('cart.add');
Route::post('/add-to-cart/{id}', [ShopController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [ShopController::class, 'cart'])->name('cart.view');
Route::get('/cart/remove/{id}', [ShopController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/checkout', [ShopController::class, 'checkoutForm'])->name('checkout.form');
Route::post('/checkout', [ShopController::class, 'checkout'])->name('checkout.submit');
Route::get('/produits', [ShopController::class, 'products'])->name('products.byCategory');

Route::get('/', function () {
    return view('home'); // page d’accueil simple
})->name('home');

Route::view('/contact', 'contact')->name('contact');

