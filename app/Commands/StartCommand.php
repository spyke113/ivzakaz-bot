<?php

namespace App\Commands;

use SergiX44\Nutgram\Nutgram;

class StartCommand
{
    public function __invoke(Nutgram $bot): void
    {
        $bot->sendMessage('Привет! Я Telegram бот для обработки заказов.');
    }
}
