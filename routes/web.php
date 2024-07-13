<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureUserIsCustomer;
use App\Http\Middleware\EnsureUserIsMerchant;
use App\Http\Controllers\Customer\CustomerCartController;
use App\Http\Controllers\Merchant\MerchantMenuController;

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [UserController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [UserController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', EnsureUserIsCustomer::class])->group(function () {
    Route::resource('/ShoppingCart', CustomerCartController::class)->names('Cart');
});

Route::middleware(['auth', EnsureUserIsMerchant::class])->group(function () {
    Route::resource('/MerchantMenu', MerchantMenuController::class)->names('MerchantMenu');
});

require __DIR__.'/auth.php';
