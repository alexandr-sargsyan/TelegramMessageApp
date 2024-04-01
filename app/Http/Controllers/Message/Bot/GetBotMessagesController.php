<?php

namespace App\Http\Controllers\Message\Bot;

use App\Http\Resources\Message\MessageResource;
use App\Http\Service\BotMessageService\GetBotMessageService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GetBotMessagesController
{
    public function __invoke(int  $chatId, GetBotMessageService $messageService): AnonymousResourceCollection
    {
        $messages = $messageService->getMessages($chatId);

        return MessageResource::collection($messages);
    }
}
