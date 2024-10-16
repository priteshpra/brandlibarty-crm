<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OpenAIService;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class ChatGPTController extends Controller
{
    protected $openai;

    public function __construct(OpenAIService $openaiService)
    {
        $this->openaiService = $openaiService;
        $this->openaiApiKey = config('services.openai.api_key');
    }

    public function index()
    {
        return view('admin.chatgpt.chat');
    }

    public function generate(Request $request)
    {

        $client = new Client();
        $url = 'https://api.openai.com/v1/chat/completions';
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $this->openaiApiKey,
        ];
        $body = [
            'model' => 'gpt-4-turbo',
            "temperature" => 0.8,
            'messages' => [
                ['role' => 'system', 'content' => $request->input('message'), 'max_tokens ' => 4095],
                ['role' => 'user', 'content' => $request->input('message'), 'max_tokens ' => 4095]
            ],
        ];
        $response = $client->post($url, [
            'headers' => $headers,
            'json' => $body,
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return response()->json($result['choices'][0]['message']['content']);
    }

    public function generate2(Request $request)
    {
        $total = count($request->input('message'));
        for ($i = 0; $i < $total; $i++) {
            // dd($request->input('message')[$i]);
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $this->openaiApiKey,
            ])->post("https://api.openai.com/v1/chat/completions", [
                "model" => "gpt-3.5-turbo",
                'messages' => [
                    [
                        "role" => "system",
                        "content" => "You are a helpful assistant."
                    ],
                    [
                        "role" => "user",
                        "content" => $request->input('message')[$i]
                    ],
                    [
                        "role" => "assistant",
                        "content" => "The Los Angeles Dodgers won the World Series in 2020."
                    ],
                    [
                        "role" => "user",
                        "content" => $request->input('message')[$i]
                    ],
                ],
                'temperature' => 1.0,
                'max_tokens' => 4000,
                'frequency_penalty' => 0,
                'presence_penalty' => 0,
            ])->json();
            $updatedContent = preg_replace('/\*\*(.*?)\*\*/', '<h2 class="imageGet text">$1</h2>', $response['choices'][0]['message']['content']);
            $updatedContent2 = preg_replace('/\*(.*?)\*/', '<h4>$1</h4>', $updatedContent);
            $generatedText0 = $updatedContent2;
            $generatedText[] = $generatedText0;
        }

        return $generatedText;
    }
}
