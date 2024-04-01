<?php

namespace App\Http\Service\BotMessageService;

use App\Http\Dto\BotMessageDto;
use App\Http\Service\BotCreateService\BotCreateRequestBuilderService;
use App\Interface\Message\MessageInterface;
use App\Models\Message;

class SendBotMessageService
{
    protected string $method = 'sendMessage';

    public function __construct(
        protected BotCreateRequestBuilderService $builderService,
        protected MessageInterface $messageRepository
    ) {
    }

    public function send(BotMessageDto $messageDto): Message
    {
        $messageArray = $this->checkReplyParameters($messageDto->toArray());

        $data = $this->builderService->sendRequest($this->method, $messageArray);

        $messageArray = $this->messageRepository->messageData($data);

        return $this->messageRepository->createMessage($messageArray);
    }

    public function checkReplyParameters(array $data): array
    {
        if ($data['reply_parameters']) {
            $data['reply_parameters']['message_id'] = $this->messageRepository->getTgMessageId(
                $data['reply_parameters']['message_id']
            );
        } else {
            unset($data['reply_parameters']);
        }

        return $data;
    }
}
