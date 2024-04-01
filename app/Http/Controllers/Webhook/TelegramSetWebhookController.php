<?php

namespace App\Http\Controllers\Webhook;

use App\Http\Service\BotCreateService\BotCreateRequestBuilderService;
use Illuminate\Http\Request;

class TelegramSetWebhookController
{
    /**
     * @throws \Exception
     */
    public function __invoke(Request $request, BotCreateRequestBuilderService $builderService): string
    {
        return $builderService->buildWebhookUrl();
    }
}
