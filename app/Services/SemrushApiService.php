<?php

namespace App\Services;

use GuzzleHttp\Client;

class SemrushApiService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.semrush.com',
        ]);
        $this->apiKey = env('SEMRUSH_API_KEY');
    }

    public function getDomainOverview($domain)
    {
        $response = $this->client->request('GET', '/analytics/v1/semrush-reports/domain-overview', [
            'query' => [
                'key' => $this->apiKey,
                'type' => 'domain_ranks',
                'export_columns' => 'Dn,Rk,Or,Ot,Oc,Og,Ad,At,Ac,Ag',
                'domain' => $domain,
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
