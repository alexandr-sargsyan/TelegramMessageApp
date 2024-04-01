<?php


use App\Http\Controllers\Message\Bot\GetBotMessageController;
use App\Http\Controllers\Message\Bot\GetBotMessagesController;
use App\Http\Controllers\Message\Bot\SendBotMessageController;
use App\Http\Controllers\Message\Client\GetClientMessageController;
use App\Http\Controllers\Message\Client\GetClientMessagesController;
use App\Http\Controllers\Webhook\TelegramSetWebhookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('bot/')->group(function () {
    Route::post('/initWebhook', TelegramSetWebhookController::class)->name('set.webhook');
    Route::post('/sendMessage', SendBotMessageController::class)->name('send.bot.message');
    Route::get('/chat/{chatId}/messages', GetBotMessagesController::class)->name('get.bot.messages');
    Route::get('/chat/{chatId}/messages/{messageId}', GetBotMessageController::class)->name('get.bot.message');
});


Route::prefix('client/')->group(function () {
    Route::get('/chat/{chatId}/messages', GetClientMessagesController::class)->name('get.client.messages');
    Route::get('/chat/{chatId}/messages/{messageId}', GetClientMessageController::class)->name('get.client.message');
});
