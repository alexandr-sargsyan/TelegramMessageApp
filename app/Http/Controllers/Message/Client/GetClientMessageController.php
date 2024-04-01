<?php

namespace App\Http\Controllers\Message\Client;

use App\Http\Resources\Message\MessageResource;
use App\Http\Service\ClientMessageService\GetClientMessageService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GetClientMessageController
{
    public function __invoke(int  $chatId,int $messageId,GetClientMessageService $messageService): AnonymousResourceCollection
    {
        $messages = $messageService->getMessage($chatId,$messageId);

        return MessageResource::collection($messages);
    }
}
