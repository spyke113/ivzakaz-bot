<?php

namespace App\Commands;

use SergiX44\Nutgram\Nutgram;
use App\Services\OpenCartService;

class StatusCommand
{
    public function __invoke(Nutgram $bot, OpenCartService $openCartService): void
    {
        $status = $openCartService->getOrderStatus(1); // Пример ID заказа
        $bot->sendMessage('Статус заказа: ' . $status);
    }
}
