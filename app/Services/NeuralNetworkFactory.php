<?php

namespace App\Services;

use InvalidArgumentException;

class NeuralNetworkFactory
{
    /**
     * Создает провайдер нейронной сети в зависимости от настроек.
     *
     * @return NeuralNetworkInterface
     * @throws InvalidArgumentException
     */
    public static function createProvider(): NeuralNetworkInterface
    {
        $provider = config('neural_network_provider', 'openai');

        return match ($provider) {
            'openai' => app(OpenAiService::class),
            'deepseek' => app(DeepSeekService::class),
            default => throw new InvalidArgumentException("Unsupported neural network provider: $provider"),
        };
    }
}
