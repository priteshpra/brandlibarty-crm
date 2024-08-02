<?php

namespace App\Services;

use GuzzleHttp\Client;

class OpenAIService
{
    protected $client;
    protected $baseUrl = 'https://api.openai.com/v1/';

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => $this->baseUrl,
            'headers' => [
                'Authorization' => 'Bearer ' . config('services.openai.api_key'),
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    public function generateCompletion($prompt)
    {
        $response = $this->client->post('completions', [
            'json' => [
                'model' => 'text-davinci-003', // choose the model you want to use
                'prompt' => $prompt,
                'max_tokens' => 150,
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
