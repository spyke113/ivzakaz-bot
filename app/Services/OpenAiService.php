<?php

namespace App\Services;

use OpenAI\Client;

class OpenAiService implements NeuralNetworkInterface
{
    private Client $client;

    public function __construct(
        string $apiKey,
        private string $model,
        private float $temperature,
        private int $maxTokens
    ) {
        $this->client = \OpenAI::client($apiKey);
    }

    public function parseOrderText(string $text): array
    {
        $response = $this->client->completions()->create([
            'model' => $this->model,
            'prompt' => $text,
            'temperature' => $this->temperature,
            'max_tokens' => $this->maxTokens,
        ]);

        return json_decode($response['choices'][0]['text'], true);
    }
}
