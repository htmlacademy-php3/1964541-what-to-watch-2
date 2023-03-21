<?php

namespace Wtw\Repository;

use GuzzleHttp\Client;
use Wtw\Interface\MovieRepositoryInterface;

class OmdRepository implements MovieRepositoryInterface
{
    private string $apikey = 'ed05385c';
    private string $baseUrl = 'http://www.omdbapi.com';
    private readonly string $imdbId;

    public function __construct($imdbId)
    {
        $this->imdbId = $imdbId;
    }

    public function get(): array
    {
        $client = new Client([
            'base_uri' => $this->baseUrl
        ]);

        $response = $client->request('GET', "?i={$this->imdbId}&apikey={$this->apikey}");

        return json_decode($response->getBody()->getContents(), true);
    }
}