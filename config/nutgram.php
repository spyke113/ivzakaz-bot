<?php

declare(strict_types=1);

return [
    'bot' => [
        'token' => env('TELEGRAM_BOT_TOKEN'),
    ],
    'handlers' => [
        // Здесь можно добавить обработчики событий
    ],
    'cache' => [
        // Конфигурация кэша (по умолчанию используется файловый кэш)
    ],
];
