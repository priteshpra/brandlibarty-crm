<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class MozService
{
    protected $client;
    protected $accessId;
    protected $secretKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->accessId = env('MOZ_ACCESS_ID');
        $this->secretKey = env('MOZ_SECRET_KEY');
    }

    public function getKeywordData($keyword)
    {
        $endpoint = 'https://lsapi.seomoz.com/v2/keyword_metrics';
        $expires = time() + 300;
        $data = json_encode([
            'keyword' => $keyword
        ]);
        $signature = base64_encode(hash_hmac('sha1', "{$this->accessId}\n$expires", $this->secretKey, true));

        $response = $this->client->post($endpoint, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => "Basic " . base64_encode("{$this->accessId}:$signature"),
                // 'x-moz-signature' => $signature,
                'x-moz-token' => 'sEhVn8iZDM3bUHqBV8U9JuVeijWaxa74RCkzYklbwLQCPUzIvbuko41uQiTnAaVT',
                'x-moz-date' => $expires
            ],
            'body' => $data
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function getKeywordMetrics($keyword)
    {
        $endpoint = 'https://lsapi.seomoz.com/v2/keyword_metrics';
        $expires = time() + 300;
        $data = [
            'method' => 'get_keyword_metrics',
            'params' => [
                'keyword' => $keyword
            ],
            'id' => 1,
            'jsonrpc' => '2.0'
        ];
        $signature = base64_encode(hash_hmac('sha1', "{$this->accessId}\n$expires", $this->secretKey, true));

        try {
            $response = $this->client->post($endpoint, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => "Basic " . base64_encode("{$this->accessId}:$signature"),
                    'x-moz-signature' => $signature,
                    'x-moz-date' => $expires
                ],
                'json' => $data
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                return json_decode($e->getResponse()->getBody()->getContents(), true);
            }
            return ['error' => 'Request failed'];
        }
    }
}
