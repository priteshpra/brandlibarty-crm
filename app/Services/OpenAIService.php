<?php

namespace App\Services;

// use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use OpenAI\Client;
use OpenAI;
use OpenAI\Factory as ClientFactory;

class OpenAIService
{
    protected $client;
    protected $baseUrl = 'https://api.openai.com/v1/';
    protected $apiKey;

    public function __construct()
    {
        // $this->client = new Client([
        //     'base_uri' => $this->baseUrl,
        //     'headers' => [
        //         'Authorization' => 'Bearer ' . config('services.openai.api_key'),
        //         'Content-Type' => 'application/json',
        //     ],
        // ]);
        $this->client = OpenAI::client(env('OPENAI_API_KEY'));
        $this->apiKey = env('OPENAI_API_KEY');
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

    public function generateText(string $prompt)
    {

        // // $response = $this->client->completions()->create([
        // // 'model' => 'gpt-3.5-turbo-instruct',
        // // 'prompt' => $prompt,
        // $response = $this->client->chat()->create([
        //     'model' => 'gpt-3.5-turbo',
        //     'messages' => [
        //         ['role' => 'system', 'content' => $prompt],
        //         ['role' => 'user', 'content' => $prompt],
        //     ],
        //     'max_tokens' => 4000,
        //     'temperature' => 0.1,
        // ]);



        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $this->apiKey,
        ])
            ->post("https://api.openai.com/v1/chat/completions", [
                "model" => "gpt-3.5-turbo",
                'messages' => [
                    [
                        "role" => "system",
                        "content" => "You are a helpful assistant."
                    ],
                    [
                        "role" => "user",
                        "content" => $prompt
                    ],
                    [
                        "role" => "assistant",
                        "content" => "The Los Angeles Dodgers won the World Series in 2020."
                    ],
                    [
                        "role" => "user",
                        "content" => $prompt
                    ],
                ],
                'temperature' => 1.0,
                'max_tokens' => 4000,
                'frequency_penalty' => 0,
                'presence_penalty' => 0,
            ])
            ->json();

        // dd($response['choices'][0]['message']['content']);
        return $response['choices'][0]['message']['content'];
    }
}
