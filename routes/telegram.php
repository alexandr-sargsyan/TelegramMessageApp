<?php

use App\Http\Controllers\Webhook\TelegramGetWebhookController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::post('getWebhook', TelegramGetWebhookController::class);
});
