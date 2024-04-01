<?php

namespace App\Http\Service\ClientMessageService;

use App\Interface\Message\MessageInterface;
use Illuminate\Support\Collection;

class GetClientMessageService
{
    public function __construct(protected MessageInterface $messageRepository)
    {
    }

    public function getMessages($chatId): Collection
    {
        return $this->messageRepository->getClientMessagesByChat($chatId);
    }

    public function getMessage($chatId, $messageId): Collection
    {
        return $this->messageRepository->getClientMessageByChat($chatId, $messageId);
    }
}
