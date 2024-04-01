<?php

namespace App\Http\Service\BotMessageService;

use App\Interface\Message\MessageInterface;
use Illuminate\Support\Collection;

class GetBotMessageService
{
    public function __construct(protected MessageInterface $messageRepository)
    {
    }

    public function getMessages($chatId): Collection
    {
        return $this->messageRepository->getBotMessagesByChat($chatId);
    }

    public function getMessage($chatId, $messageId): Collection
    {
        return $this->messageRepository->getBotMessageByChat($chatId, $messageId);
    }
}
