<?php

namespace App\Http\Controllers\Message\Bot;

use App\Http\Controllers\Controller;
use App\Http\Dto\BotMessageDto;
use App\Http\Requests\Message\SendBotMessageRequest;
use App\Http\Resources\Message\MessageResource;
use App\Http\Service\BotMessageService\SendBotMessageService;

class SendBotMessageController extends Controller
{


    public function __invoke(SendBotMessageRequest $request, SendBotMessageService $messageService): MessageResource
    {
        $messageDto = BotMessageDto::fromRequest($request);

        $message = $messageService->send($messageDto);

        return new MessageResource($message);
    }
}
