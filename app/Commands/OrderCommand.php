<?php

namespace App\Commands;

use SergiX44\Nutgram\Nutgram;
use App\Services\OpenAiService;
use App\Services\OpenCartService;

class OrderCommand
{
    public function __invoke(Nutgram $bot, string $text, OpenAiService $openAiService, OpenCartService $openCartService): void
    {
        $parsedOrder = $openAiService->parseOrderText($text);
        $response = $openCartService->processOrder($parsedOrder);

        $bot->sendMessage('Ваш заказ успешно обработан: ' . json_encode($response));
    }
}
