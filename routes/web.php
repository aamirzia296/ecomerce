<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', ProductController::class);
});

Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/shop', [CartController::class, 'shop'])->name('shop');
    Route::get('/cart', [CartController::class, 'cart'])->name('cart');
    Route::post('/add-to-cart/{product}', [CartController::class, 'addToCart'])->name('add.to.cart');
    Route::patch('/update-cart', [CartController::class, 'updateCart'])->name('update.cart');
    Route::delete('/remove-from-cart', [CartController::class, 'removeFromCart'])->name('remove.from.cart');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
});

require __DIR__.'/auth.php';


