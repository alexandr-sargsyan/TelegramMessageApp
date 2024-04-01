<?php

namespace App\Http\Dto;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\LaravelData\Data;

class ClientMessageDto extends Data
{
    public int $tg_message_id;
    public int $tg_chat_id;
    public string $tg_chat_type;
    public int $tg_from_user_id;
    public string $tg_from_first_name;
    public ?string $tg_from_username;
    public bool $is_bot;
    public string $text;

    public static function fromRequest(Request $request): self
    {
        return self::from([
            "tg_message_id" => $request['message']['message_id'],
            "tg_chat_id" => $request['message']['chat']['id'],
            "tg_chat_type" => $request['message']['chat']['type'],
            "tg_from_user_id" => $request['message']['from']['id'],
            "tg_from_first_name" => $request['message']['from']['first_name'],
            "tg_from_username" => $request['message']['from']['username'] ?? null,
            "is_bot" => $request['message']['from']['is_bot'],
            "text" => $request['message']['text'],
        ]);
    }
}
