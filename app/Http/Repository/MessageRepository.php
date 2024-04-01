<?php

namespace App\Http\Repository;

use App\Interface\Message\MessageInterface;
use App\Models\Message;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class MessageRepository implements MessageInterface
{
    protected Builder $query;

    public function __construct()
    {
        $this->query = Message::query();
    }

    public function getAllMessages(): Collection
    {
        return $this->query->get();
    }

    public function getMessageById(int $id): ?Message
    {
        return $this->query->find($id);
    }

    public function getBotMessagesByChat(int $chatId): Collection
    {
        return $this->query->where('tg_chat_id', $chatId)->where('is_bot', true)->get();
    }

    public function getBotMessageByChat(int $chatId,int $messageId): Collection
    {
        return $this->query->where('tg_chat_id', $chatId)->where('id',$messageId)->where('is_bot', true)->get();
    }

    public function getClientMessagesByChat(int $chatId): Collection
    {
        return $this->query->where('tg_chat_id', $chatId)->where('is_bot', false)->get();
    }

    public function getClientMessageByChat(int $chatId,int $messageId): Collection
    {
        return $this->query->where('tg_chat_id', $chatId)->where('id',$messageId)->where('is_bot', false)->get();
    }

    public function createMessage(array $data): Message
    {
        return $this->query->create($data);
    }

    public function updateMessage(int $id, array $data): bool
    {
        $message = $this->query->find($id);
        if ($message) {
            $message->update($data);
            return true;
        }
        return false;
    }

    public function deleteMessage(int $id): bool
    {
        return $this->query->find($id)->delete();
    }

    public function getTgMessageId(int $id): ?int
    {
        return $this->query->where('id', $id)->value('tg_message_id');
    }

    public function messageData(array $data): array
    {
        return [
            'tg_message_id' => $data['result']['message_id'],
            'tg_chat_id' => $data['result']['chat']['id'],
            'tg_chat_type' => $data['result']['chat']['type'],
            'tg_from_user_id' => $data['result']['from']['id'],
            'tg_from_first_name' => $data['result']['from']['first_name'],
            'tg_from_username' => $data['result']['from']['username'],
            'is_bot' => $data['result']['from']['is_bot'],
            'text' => $data['result']['text'],
        ];
    }



}


