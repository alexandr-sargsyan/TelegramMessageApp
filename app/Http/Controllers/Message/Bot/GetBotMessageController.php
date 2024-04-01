<?php

namespace App\Http\Controllers\Message\Bot;

use App\Http\Resources\Message\MessageResource;
use App\Http\Service\BotMessageService\GetBotMessageService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GetBotMessageController
{
    public function __invoke(int $chatId,int $messageId, GetBotMessageService $messageService): AnonymousResourceCollection
    {
        $messages = $messageService->getMessage($chatId,$messageId);

        return MessageResource::collection($messages);
    }
}
