<?php

namespace App\Http\Controllers;

use App\Services\MozService;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Keywords;

class MozController extends Controller
{
    protected $mozService;

    public function __construct(MozService $mozService)
    {
        $this->mozService = $mozService;
    }

    public function index()
    {
        $Keywords = Keywords::all()->where('status', 1);
        return view('admin.keyword.index', compact('Keywords'));
    }

    public function getKeywordData(Request $request)
    {
        $keyword = $request->input('keyword');
        $data = $this->mozService->getKeywordData($keyword);

        return response()->json($data);
    }

    public function savekeywordTitle(Request $request)
    {
        $title = $request->input('Title');
        $id = $request->input('id');
        $Keywords = Keywords::where('id', $id)->first();
        $Keywords->title = $title;
        $Keywords->save();

        return response()->json($Keywords);
    }

    public function getKeywords(Request $request)
    {
        $keyword = $request->input('keyword');
        $accessID = env('MOZ_ACCESS_ID');
        $secretKey = env('MOZ_SECRET_KEY');
        $expires = time() + 300;

        $stringToSign = $accessID . "\n" . $expires;
        $binarySignature = hash_hmac('sha1', $stringToSign, $secretKey, true);
        $urlSafeSignature = urlencode(base64_encode($binarySignature));

        $client = new Client();
        $response = $client->post('https://lsapi.seomoz.com/v2/keyword_metrics', [
            'headers' => [
                'Authorization' => "AccessID={$accessID};Expires={$expires};Signature={$urlSafeSignature}",
                'x-moz-token' => 'sEhVn8iZDM3bUHqBV8U9JuVeijWaxa74RCkzYklbwLQCPUzIvbuko41uQiTnAaVT',
            ],
            'query' => [
                'q' => $keyword,
                'count' => 10,
            ]
        ]);

        return response()->json(json_decode($response->getBody(), true));
    }
}
