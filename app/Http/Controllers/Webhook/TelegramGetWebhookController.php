<?php

namespace App\Http\Controllers\Webhook;

use App\Http\Dto\ClientMessageDto;
use App\Http\Service\ClientMessageService\StoreClientMessageService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class TelegramGetWebhookController extends Controller
{

    public function __invoke(Request $request,StoreClientMessageService $messageService)
    {
        $dto = ClientMessageDto::fromRequest($request);
        $messageService->storeMessage($dto);
    }
}
