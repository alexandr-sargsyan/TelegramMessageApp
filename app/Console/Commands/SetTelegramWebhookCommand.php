<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SetTelegramWebhookCommand extends Command
{

    protected $signature = 'telegram:webhook';

    protected $description = 'Set up the Telegram webhook';

    protected string $method = 'setWebhook';
    protected string $telegram_token;
    protected string $base_url;
    protected string $ngrok_url;

    public function __construct()
    {
        $this->telegram_token = env('TELEGRAM_BOT_TOKEN');
        $this->base_url = env('TELEGRAM_BASE_API_URL');
        $this->ngrok_url = env('NGROK_URL');

        parent::__construct();
    }

    public function handle()
    {

        $my_url =  $this->ngrok_url . "/webhook/getWebhook";
        $url = $this->base_url . $this->telegram_token . '/' . $this->method;

        $response = Http::post(
            url: $url,
           data: ['url' => $my_url]
        );

        if ($response->successful()) {
            $this->info('Webhook set successfully.');
        } else {
            $this->error('Failed to set webhook: '.$response->status());
        }
    }
}
