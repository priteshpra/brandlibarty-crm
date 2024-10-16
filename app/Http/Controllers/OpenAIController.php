<?php

namespace App\Http\Controllers;

use App\Services\OpenAIService;
use Illuminate\Http\Request;

class OpenAIController extends Controller
{
    protected $openAIService;

    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }

    public function generateText(Request $request)
    {
        $prompt = $request->input('prompt');
        $generatedText = $this->openAIService->generateText($prompt);
        $generatedText = str_replace("\n", '<br/>', $generatedText);
        // $generatedText = str_replace("**",'<h2>', $generatedText);
        // dd($generatedText);
        return view('admin.chatgpt.result', compact('generatedText'));
    }

    public function showForm()
    {
        return view('admin.chatgpt.form');
    }
}
