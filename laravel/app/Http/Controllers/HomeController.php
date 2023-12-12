<?php

namespace App\Http\Controllers;

use App\Services\ChannelService;
use App\Services\MemberService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Services\SlackApiService;

class HomeController extends Controller
{
    public function __construct(
        protected ChannelService $channel_service,
        protected MemberService $member_service,
    ) {}

    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $channels = $this->channel_service->list();

        return view('index', compact('channels'));
    }
}
