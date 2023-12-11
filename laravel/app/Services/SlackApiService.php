<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use JsonException;

class SlackApiService
{
    private Client $client;
    private string $base_url;
    private array $headers;

    public function __construct() {
        $this->client = new Client();
        $this->base_url = config('services.slack.api_url');
        $this->headers = [
            'Authorization' => 'Bearer '.config('services.slack.token')
        ];
    }

    /**
     * @throws GuzzleException
     * @throws JsonException
     */
    public function conversationsList(): void {
        $url = $this->base_url.'conversations.list';
        $response = $this->client->get($url, [
            'headers' => $this->headers,
            'query' => [
                'pretty' => 1
            ]
        ]);
        $body = json_decode((string)$response->getBody(), true, 512, JSON_THROW_ON_ERROR);
    }
}
