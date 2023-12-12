<?php

namespace App\Services;

use App\Repositories\MemberRepository;
use Illuminate\Database\Eloquent\Collection;

class MemberService
{
    public function __construct(
        protected SlackApiService $slack_api_service,
        protected MemberRepository $member_repo
    ) {}

    /**
     * @return Collection
     */
    public function list(): Collection
    {
        return $this->member_repo->all();
    }
}
