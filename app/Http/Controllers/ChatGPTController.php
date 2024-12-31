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
        ini_set('max_execution_time', 1200);
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
            $response = Http::retry(3, 200) // Retry up to 3 times with 200ms delay
                ->timeout(120)->withHeaders([
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $this->openaiApiKey,
                ])->post("https://api.openai.com/v1/chat/completions", [
                    "model" => "gpt-4-turbo", //"gpt-3.5-turbo",
                    'messages' => [
                        [
                            "role" => "system",
                            "content" => "You are a content generator. Create long, detailed responses with examples, explanations, and thorough coverage of the topic."
                        ],
                        // [
                        //     "role" => "user",
                        //     "content" => $request->input('message')[$i]
                        // ],
                        // [
                        //     "role" => "assistant",
                        //     "content" => $request->input('message')[$i]
                        // ],
                        [
                            "role" => "user",
                            "content" => $request->input('message')[$i]
                        ],
                    ],
                    'temperature' => 1.0,
                    'top_p' => 1.0,
                    'max_tokens' => 8000,
                    'frequency_penalty' => 0,
                    'presence_penalty' => 0,
                ])->json();
            // old
            // $updatedContent = preg_replace('/\*\*(.*?)\*\*/', '<h2 class="imageGet text">$1</h2><div id="result_$1" data-id="$1"></div>', $response['choices'][0]['message']['content']);
            // $updatedContent2 = preg_replace('/\*(.*?)\*/', '<h4>$1</h4>', $updatedContent);
            // $generatedText0 = $updatedContent2;
            // $generatedText[] = $generatedText0;

            //new
            // Apply formatting using preg_replace or other parsing methods
            $content = $response['choices'][0]['message']['content'];
            // Apply regex replacements for markdown to HTML
            $content = preg_replace('/^# (.*?)$/m', '<h1 class="main-title">$1</h1>', $content);  // Convert # to <h1>
            $content = preg_replace('/^## (.*?)$/m', '<h2 class="imageGet text">$1</h2><div class="custom-div" id="result_' . preg_replace('/\s+/', '_', '$1') . '" data-id="' . preg_replace('/\s+/', '_', '$1') . '"></div>', $content);;  // Convert # to <h2>
            $content = preg_replace('/^### (.*?)$/m', '<h3 class="sub-heading">$1</h3>', $content); // Convert ### to <h3>
            $content = preg_replace('/- (.*?)\n/', '<li>$1</li>', $content); // Replace '-' with <li> for lists
            $content = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $content); // Replace '**' with <strong> for bold
            $content = preg_replace('/\n/', '<br>', $content); // Add line breaks
            $content = preg_replace('/(<li>.*?)<\/li>/', '<ul class="list-style">$0</ul>', $content); // Wrap list items in <ul>
            $generatedText[] = $content;
        }

        return $generatedText;
    }
}
