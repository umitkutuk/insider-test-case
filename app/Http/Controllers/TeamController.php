<?php

namespace App\Http\Controllers;

use App\Events\Team\TeamCreated;
use App\Events\Team\TeamDeleted;
use App\Events\Team\TeamUpdated;
use App\Http\Requests\Team\TeamStoreRequest;
use App\Http\Requests\Team\TeamUpdateRequest;
use App\Http\Resources\Team\TeamCollection;
use App\Http\Resources\Team\TeamResource;
use App\Queries\Team\TeamsQuery;
use App\Services\Team\TeamServiceInterface;

class TeamController extends Controller
{
    /**
     * @var \App\Services\Team\TeamServiceInterface
     */
    public $teamService;

    /**
     * AreaController constructor.
     * @param \App\Services\Team\TeamServiceInterface $teamService
     */
    public function __construct(TeamServiceInterface $teamService)
    {
        $this->teamService = $teamService;
    }

    public function index()
    {
        $teams = (new TeamsQuery())->get();

        return view('team.index', compact('teams'));
    }
}
