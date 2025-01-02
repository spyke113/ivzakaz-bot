<?php

namespace App\Services;

class DeepSeekService implements NeuralNetworkInterface
{
    public function __construct(
        private string $apiKey,
        private string $model,
        private float $temperature,
        private int $maxTokens
    ) {}

    public function parseOrderText(string $text): array
    {
        // Логика для взаимодействия с DeepSeek
        return [];
    }
}
