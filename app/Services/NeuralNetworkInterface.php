<?php

namespace App\Services;

interface NeuralNetworkInterface
{
    public function parseOrderText(string $text): array;
}
