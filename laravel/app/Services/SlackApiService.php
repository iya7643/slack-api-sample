<?php

namespace App\Services;

use App\Repositories\ChannelRepository;
use App\Repositories\MemberRepository;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\DB;
use JsonException;

class SlackApiService
{
    private Client $client;
    private string $base_url;
    private array $headers;

    public function __construct(
        protected MemberRepository $member_repo,
        protected ChannelRepository $channel_repo
    ) {
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
    public function usersList(): void {
        $body = $this->get($this->base_url.'users.list', $this->headers, [
            'pretty' => 1
        ]);

        if($body['ok']) {
            DB::transaction(function() use($body) {
                foreach($body['members'] as $member) {
                    $this->member_repo->save($member);
                }
            });
        }
    }

    /**
     * @throws GuzzleException
     * @throws JsonException
     */
    public function conversationsList(): void {
        $body = $this->get($this->base_url.'conversations.list', $this->headers, [
            'pretty' => 1
        ]);

        if($body['ok']) {
            DB::transaction(function() use($body) {
                foreach ($body['channels'] as $channel) {
                    $this->channel_repo->save($channel);
                }
            });
        }
    }

    /**
     * @param string $url
     * @param array $headers
     * @param array $query
     * @return array
     * @throws GuzzleException
     * @throws JsonException
     */
    private function get(string $url, array $headers, array $query): array {
        $response = $this->client->get($url, [
            'headers' => $headers,
            'query' => $query,
        ]);

        return json_decode((string)$response->getBody(), true, 512, JSON_THROW_ON_ERROR);
    }
}
