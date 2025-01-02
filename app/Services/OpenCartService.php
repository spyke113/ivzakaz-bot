<?php

namespace App\Services;

use GuzzleHttp\Client;

class OpenCartService
{
    private Client $client;

    public function __construct(
        private string $baseUrl,
        private string $apiToken
    ) {
        $this->client = new Client([
            'base_uri' => $this->baseUrl,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiToken,
            ],
        ]);
    }

    public function processOrder(array $order): array
    {
        $response = $this->client->post('/orders', [
            'json' => $order,
        ]);

        return json_decode($response->getBody(), true);
    }

    public function getOrderStatus(int $orderId): string
    {
        $response = $this->client->get("/orders/{$orderId}");
        $data = json_decode($response->getBody(), true);

        return $data['status'] ?? 'Ожидает обработки';
    }
}
