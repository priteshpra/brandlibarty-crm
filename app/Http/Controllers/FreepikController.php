<?php

namespace App\Http\Controllers;

use App\Services\FreepikService;
use Illuminate\Http\Request;

class FreepikController extends Controller
{
    protected $freepikService;

    public function __construct(FreepikService $freepikService)
    {
        $this->freepikService = $freepikService;
    }

    public function generate(Request $request)
    {
        $request->validate([
            'text' => 'required|string',
        ]);

        $result = $this->freepikService->generateImageFromText($request->text);

        if (isset($result['error'])) {
            return response()->json(['error' => $result['error']], 400);
        }

        return response()->json($result);
    }
}
