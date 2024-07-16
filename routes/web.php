<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureUserIsCustomer;
use App\Http\Middleware\EnsureUserIsMerchant;
use App\Http\Controllers\Customer\CustomerCartController;
use App\Http\Controllers\Merchant\MerchantMenuController;

Route::get('/', function () {
    if(auth()->check()) return redirect()->route('dashboard');
    return view('hero.welcome');
});

Route::get('/dashboard', function () {
    return view('hero.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/user', [UserController::class, 'edit'])->name('user.edit');
    Route::patch('/user', [UserController::class, 'update'])->name('user.update');
    // Route::delete('/user', [UserController::class, 'destroy'])->name('user.destroy');
});

Route::middleware(['auth', 'verified', EnsureUserIsCustomer::class])->group(function () {
    Route::resource('/ShoppingCart', CustomerCartController::class)->names('Cart');
});

Route::middleware(['auth', 'verified', EnsureUserIsMerchant::class])->group(function () {
    Route::resource('/MerchantMenu', MerchantMenuController::class)->names('MerchantMenu');
});

require __DIR__.'/auth.php';
