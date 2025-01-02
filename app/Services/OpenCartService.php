<?php

declare(strict_types=1);

namespace App\Services;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

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

        return $this->parseResponse($response);
    }

    public function getOrderStatus(int $orderId): string
    {
        $response = $this->client->get("/orders/{$orderId}");
        $data = $this->parseResponse($response);
        return $data['status'] ?? 'Ожидает обработки';
    }

    private function parseResponse(ResponseInterface $response): array
    {
        return json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
    }
}
