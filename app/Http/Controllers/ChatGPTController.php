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

        // $response = Http::withHeaders([
        //     'Authorization' => 'Bearer ' . $this->openaiApiKey,
        //     'Content-Type' => 'application/json',
        // ])->post('https://api.openai.com/v1/chat/completions', [
        //     'messages' => ["role"=> "user","content"=>$request->input('message')],
        //     "model" => "gpt-3.5-turbo", // gpt-3.5-turbo-16k
        //     'max_tokens' => 150,
        // ]);

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

        // return $response->json();
    }
}
