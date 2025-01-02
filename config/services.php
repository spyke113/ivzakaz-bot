<?php

return [
    'neural_network_provider' => env('NEURAL_NETWORK_PROVIDER', 'openai'),
    'opencart' => [
        'base_url' => env('OPENCART_BASE_URL'),
        'api_token' => env('OPENCART_API_TOKEN'),
    ],
    'openai' => [
        'api_key' => env('OPENAI_API_KEY'),
        'model' => env('OPENAI_MODEL'),
        'temperature' => (float)env('OPENAI_TEMPERATURE'),
        'max_tokens' => (int)env('OPENAI_MAX_TOKENS'),
    ],
    'deepseek' => [
        'api_key' => env('DEEPSEEK_API_KEY'),
        'model' => env('DEEPSEEK_MODEL'),
        'temperature' => (float)env('DEEPSEEK_TEMPERATURE'),
        'max_tokens' => (int)env('DEEPSEEK_MAX_TOKENS'),
    ],
];
