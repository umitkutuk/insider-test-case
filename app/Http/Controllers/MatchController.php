<?php

namespace App\Http\Controllers;

use App\Events\Match\MatchCreated;
use App\Events\Match\MatchDeleted;
use App\Events\Match\MatchUpdated;
use App\Http\Requests\Match\MatchStoreRequest;
use App\Http\Requests\Match\MatchUpdateRequest;
use App\Http\Resources\Match\MatchCollection;
use App\Http\Resources\Match\MatchResource;
use App\Queries\Match\MatchesQuery;
use App\Services\Match\MatchServiceInterface;

class MatchController extends Controller
{
    /**
     * @var \App\Services\Match\MatchServiceInterface
     */
    public $matchService;

    /**
     * AreaController constructor.
     * @param \App\Services\Match\MatchServiceInterface $matchService
     */
    public function __construct(MatchServiceInterface $matchService)
    {
        $this->matchService = $matchService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $matches = (new MatchesQuery())->get();

        return view('match.index', compact('matches'));
    }
}
