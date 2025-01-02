<?php

require_once __DIR__ . '/vendor/autoload.php';

use Illuminate\Container\Container;
use Illuminate\Support\Facades\Facade;
use Dotenv\Dotenv;

// Инициализация контейнера
$app = new Container();
Container::setInstance($app);

// Подключение Facade
Facade::setFacadeApplication($app);

// Загрузка переменных окружения
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Загрузка хелперов
require_once __DIR__ . '/app/helpers.php';

// Регистрация сервисов
$app->singleton(Nutgram::class, function () {
    return new Nutgram(env('TELEGRAM_BOT_TOKEN'));
});

$app->singleton(OpenAiService::class, function () {
    return new OpenAiService(
        env('OPENAI_API_KEY'),
        env('OPENAI_MODEL'),
        env('OPENAI_TEMPERATURE'),
        env('OPENAI_MAX_TOKENS')
    );
});

$app->singleton(DeepSeekService::class, function () {
    return new DeepSeekService(
        env('DEEPSEEK_API_KEY'),
        env('DEEPSEEK_MODEL'),
        env('DEEPSEEK_TEMPERATURE'),
        env('DEEPSEEK_MAX_TOKENS')
    );
});

$app->singleton(OpenCartService::class, function () {
    return new OpenCartService(
        env('OPENCART_BASE_URL'),
        env('OPENCART_API_TOKEN')
    );
});
