<?php

namespace App\Http\Requests\Message;

use App\Enums\MessageParseMode;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SendBotMessageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'text' => ['required', 'string', 'min:1', 'max:4096'],
            'parse_mode' => [Rule::in(MessageParseMode::values())],
            'message_thread_id' => ['nullable', 'int'],
            'disable_web_page_preview' => ['nullable', 'bool'],
            'disable_notification' => ['nullable', 'bool'],
            'protect_content' => ['nullable', 'bool'],
            'allow_sending_without_reply' => ['nullable', 'bool'],
            'chat_id' => 'required|string',
            'entities' => 'nullable|array',
            'entities.*.start_offset' => 'required|integer',
            'entities.*.end_offset' => 'required|integer',
            'entities.*.type' => 'required|string',
        ];
    }
}
