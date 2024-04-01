<?php

namespace App\Http\Dto;

use App\Http\Requests\Message\SendBotMessageRequest;
use Spatie\LaravelData\Data;

class BotMessageDto extends Data
{
    public string $chat_id;
    public string $text;
    public ?int $message_thread_id;
    public ?string $parse_mode;
    public ?array $entities;
    public ?bool $disable_web_page_preview;
    public ?bool $disable_notification;
    public ?bool $protect_content;
    public ?array $reply_parameters;


    public static function fromRequest(SendBotMessageRequest $request): self
    {
        return self::from([
            'chat_id' => $request->input('chat_id'),
            'message_thread_id' => $request->input('message_thread_id'),
            'text' => $request->input('text'),
            'parse_mode' => $request->input('parse_mode'),
            'entities' => $request->input('entities'),
            'disable_web_page_preview' => $request->input('disable_web_page_preview'),
            'disable_notification' => $request->input('disable_notification'),
            'protect_content' => $request->input('protect_content'),
            'allow_sending_without_reply' => $request->input('allow_sending_without_reply'),
            'reply_parameters' => $request->input('reply_parameters')
        ]);
    }

}
