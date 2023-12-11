<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Services\SlackApiService;
use JsonException;

class HomeController extends Controller
{
    public function __construct(
        protected SlackApiService $slack_api_service
    ) {}

    /**
     * @param Request $request
     * @return View
     */
    public function welcome(Request $request): View
    {
        return view('welcome');
    }

    /**
     * @param Request $request
     * @return View
     * @throws GuzzleException
     * @throws JsonException
     */
    public function index(Request $request): View
    {
        $this->slack_api_service->conversationsList();

        return view('index');
    }
}
