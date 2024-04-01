<?php

namespace App\Interface\Message;

use App\Models\Message;
use Illuminate\Support\Collection;

interface MessageInterface
{
    public function getAllMessages(): Collection;
    public function getMessageById(int $id): ?Message;
    public function createMessage(array $data): Message;
    public function updateMessage(int $id, array $data): bool;
    public function deleteMessage(int $id): bool;
    public function messageData(array $data): array;
    public function getBotMessagesByChat(int $chatId): Collection;
    public function getBotMessageByChat(int $chatId,int $messageId): Collection;
    public function getClientMessagesByChat(int $chatId): Collection;
    public function getClientMessageByChat(int $chatId,int $messageId): Collection;
}
