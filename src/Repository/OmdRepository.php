<?php

namespace Wtw\Repository;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use Wtw\Interface\MovieRepositoryInterface;

class OmdRepository implements MovieRepositoryInterface
{
    private string $baseUrl = 'http://www.omdbapi.com';
    private readonly string $apikey;

    private readonly ClientInterface $client;

    public function __construct(string $apikey, ClientInterface $httpClient)
    {
        $this->apikey = $apikey;
        $this->client = $httpClient;
    }

    private function sendRequest(string $imdbId): ResponseInterface
    {
        return $this->client->request('GET', $this->baseUrl, [
            'query' => [
                'apikey' => $this->apikey,
                'i' => $imdbId,
            ]
        ]);
    }

    public function get(string $imdbId): array
    {
        $response = $this->sendRequest($imdbId);

        return json_decode($response->getBody()->getContents(), true);
    }
}