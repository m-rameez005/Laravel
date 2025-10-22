<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::post('/form', [ContactController::class, 'submitForm'])->name('contact.submit');
Route::get('stripe/checkout', [App\Http\Controllers\StripePaymentController::class, 'checkout']);
// Route::post('stripe/checkout-session', [App\Http\Controllers\StripePaymentController::class, 'session'])->name('stripe.session');
Route::get('stripe/test-session', [App\Http\Controllers\StripePaymentController::class, 'session']);
Route::get('stripe/test-checkout-success', [App\Http\Controllers\StripePaymentController::class, 'success'])->name('stripe.success');
Route::get('stripe/checkout-cancel', [App\Http\Controllers\StripePaymentController::class, 'cancel'])->name('stripe.cancel');
