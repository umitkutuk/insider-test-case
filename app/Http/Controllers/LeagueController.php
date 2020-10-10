<?php

namespace App\Http\Controllers;

use App\Events\League\LeagueCreated;
use App\Events\League\LeagueDeleted;
use App\Events\League\LeagueUpdated;
use App\Http\Requests\League\LeagueStoreRequest;
use App\Http\Requests\League\LeagueUpdateRequest;
use App\Http\Resources\League\LeagueCollection;
use App\Http\Resources\League\LeagueResource;
use App\Queries\League\LeaguesQuery;
use App\Services\League\LeagueServiceInterface;

class LeagueController extends Controller
{
    /**
     * @var \App\Services\League\LeagueServiceInterface
     */
    public $leagueService;

    /**
     * AreaController constructor.
     * @param \App\Services\League\LeagueServiceInterface $leagueService
     */
    public function __construct(LeagueServiceInterface $leagueService)
    {
        $this->leagueService = $leagueService;
    }


    public function index()
    {
        $leagues = (new LeaguesQuery())->get();

        return view('league.index', compact('leagues'));
    }

    public function create()
    {
        return view('league.create');
    }


    public function store(LeagueStoreRequest $request)
    {
        $data = $request->validated();

        $league = $this->leagueService->createLeague($data);

        return $this->index();
    }

    /**
     * @param \App\Http\Requests\League\LeagueUpdateRequest $request
     * @param int $id
     * @return \App\Http\Resources\League\LeagueResource
     */
    public function update(LeagueUpdateRequest $request, $id): LeagueResource
    {
        $league = $this->leagueService->updateLeague($request->validated(), $id);

        event(new LeagueUpdated($league));

        return new LeagueResource($league);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \App\Http\Resources\League\LeagueResource
     * @throws \Exception
     */
    public function destroy($id): LeagueResource
    {
        $league = $this->leagueService->destroyLeague($id);

        event(new LeagueDeleted($league));

        return new LeagueResource($league);
    }
}
