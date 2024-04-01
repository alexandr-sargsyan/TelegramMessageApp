<?php

namespace App\Http\Service\ClientMessageService;

use App\Http\Dto\ClientMessageDto;
use App\Interface\Message\MessageInterface;

class StoreClientMessageService
{
    public function __construct(protected MessageInterface $messageRepository)
    {
    }

    public function storeMessage(ClientMessageDto $dto)
    {
        $this->messageRepository->createMessage($dto->toArray());
    }
}
