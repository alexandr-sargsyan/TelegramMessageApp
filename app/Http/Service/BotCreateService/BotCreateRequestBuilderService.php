<?php

namespace App\Http\Service\BotCreateService;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class BotCreateRequestBuilderService
{
    protected string $telegram_token;
    protected string $base_url;
    protected string $method;

    public function __construct()
    {
        $this->telegram_token = env('TELEGRAM_BOT_TOKEN');
        $this->base_url = env('TELEGRAM_BASE_API_URL');
    }

    public function sendRequest(string $method, array $data): array
    {
        $this->setMethod($method);

        $url = $this->base_url.$this->telegram_token.'/'.$this->method;

        $client = new Client();

        $response = $client->post($url, [
            'json' => $data
        ]);

        return json_decode($response->getBody(), true);
    }

    private function setMethod(string $method): void
    {
        $this->method = $method;
    }


    /**
     * @throws \Exception
     */
    public function buildWebhookUrl(): string
    {
        try {
            $webhookDomain = env('APP_WEBHOOK_ROUTER_DOMAIN');

            $my_url = "https://$webhookDomain/webhook/getWebhook/";
            $url = $this->base_url.$this->telegram_token.'/'.'setWebhook';

            $response = Http::post(
                url: $url,
                data: ['url' => $my_url]
            );

            if ($response->successful()) {
                return response()->json(['message' => 'Webhook set successfully.']);
            } else {
                return response()->json(['error' => 'Failed to set webhook: '.$response->status()], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while setting webhook: '.$e->getMessage()], 500);
        }
    }
}
