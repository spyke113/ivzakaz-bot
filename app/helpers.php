<?php

declare(strict_types=1);

if (!function_exists('app')) {
    function app(string $abstract = null, array $parameters = []): mixed
    {
        if (is_null($abstract)) {
            return Container::getInstance();
        }

        return Container::getInstance()->make($abstract, $parameters);
    }
}

if (!function_exists('env')) {
    function env(string $key, mixed $default = null): mixed
    {
        return $_ENV[$key] ?? $default;
    }
}

if (!function_exists('config')) {
    function config(string $key, mixed $default = null): mixed
    {
        // Загрузка конфигурации из файлов
        $config = require __DIR__ . '/config/services.php';

        return $config[$key] ?? $default;
    }
}
