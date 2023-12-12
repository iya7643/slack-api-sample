<?php

namespace App\Services;

use App\Repositories\ChannelRepository;
use Illuminate\Database\Eloquent\Collection;

class ChannelService
{
    public function __construct(
        protected SlackApiService $slack_api_service,
        protected ChannelRepository $channel_repo
    ) {}

    public function list(): Collection
    {
        return $this->channel_repo->all();
    }
}
