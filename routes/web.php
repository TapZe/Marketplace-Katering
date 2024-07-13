<?php

use App\Http\Controllers\Merchant\MerchantMenuController;
use App\Http\Middleware\EnsureUserIsMerchant;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\EnsureUserIsCustomer;
use App\Http\Controllers\Customer\CustomerCartController;

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', EnsureUserIsCustomer::class])->group(function () {
    Route::resource('/ShoppingCart', CustomerCartController::class)->names('Cart');
});

Route::middleware(['auth', EnsureUserIsMerchant::class])->group(function () {
    Route::resource('/MerchantMenu', MerchantMenuController::class)->names('MerchantMenu');
});

require __DIR__.'/auth.php';
