<?php

namespace App\Http\Controllers\Message\Client;

use App\Http\Resources\Message\MessageResource;
use App\Http\Service\ClientMessageService\GetClientMessageService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GetClientMessagesController
{
    public function __invoke(int  $chatId, GetClientMessageService $messageService): AnonymousResourceCollection
    {
        $messages = $messageService->getMessages($chatId);

        return MessageResource::collection($messages);
    }
}
