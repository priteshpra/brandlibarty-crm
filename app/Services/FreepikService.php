<?php

namespace App\Services;

use GuzzleHttp\Client;

class FreepikService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.freepik.com/v1/',
            'headers' => [
                'Authorization' => 'Bearer ' . env('FREEPIK_API_KEY'),
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'x-freepik-api-key' => env('FREEPIK_API_KEY'),
            ]
        ]);
    }

    public function generateImageFromText($text)
    {
        try {
            $response = $this->client->post('ai/text-to-image', [
                'json' => [
                    'prompt' => $text,
                ]
            ]);
            $responseBody = json_decode($response->getBody(), true);
            // dd($responseBody['data'][0]['base64']);
            return $responseBody['data'];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
