<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\PaymentWebhookController;
use Illuminate\Support\Facades\Route;

// Public API Routes
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::get('/services', [ServiceController::class, 'index']);
Route::get('/services/{slug}', [ServiceController::class, 'show']);

Route::get('/blog', [BlogController::class, 'index']);
Route::get('/blog/featured', [BlogController::class, 'featured']);
Route::get('/blog/{slug}', [BlogController::class, 'show']);

// Webhooks (no auth)
Route::post('/mpesa/callback', [PaymentWebhookController::class, 'mpesaCallback']);
Route::post('/stripe/webhook', [PaymentWebhookController::class, 'stripeWebhook']);
Route::match(['get', 'post'], '/whatsapp/webhook', [PaymentWebhookController::class, 'whatsappWebhook']);

// Authenticated API Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/auth/user', [AuthController::class, 'user']);
    Route::post('/auth/logout', [AuthController::class, 'logout']);

    Route::get('/bookings', [BookingController::class, 'index']);
    Route::post('/bookings', [BookingController::class, 'store']);
    Route::get('/bookings/{booking}', [BookingController::class, 'show']);
    Route::post('/bookings/{booking}/cancel', [BookingController::class, 'cancel']);
    Route::get('/bookings/slots/{serviceId}/{date}', [BookingController::class, 'slots']);
});
