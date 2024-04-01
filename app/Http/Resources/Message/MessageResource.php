<?php

namespace App\Http\Resources\Message;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int $id
 * @property int $tg_message_id
 * @property int $tg_chat_id
 * @property string $tg_chat_type
 * @property int $tg_from_user_id
 * @property string $tg_from_first_name
 * @property string $tg_from_username
 * @property bool $is_bot
 * @property string $text
 * @property string $updated_at
 * @property string $created_at
 */
class MessageResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'tg_message_id' => $this->tg_message_id,
            'tg_chat_id' => $this->tg_chat_id,
            'tg_chat_type' => $this->tg_chat_type,
            'tg_from_user_id' => $this->tg_from_user_id,
            'tg_from_first_name' => $this->tg_from_first_name,
            'tg_from_username' => $this->tg_from_username,
            'is_bot' => $this->is_bot,
            'text' => $this->text,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ];
    }
}
