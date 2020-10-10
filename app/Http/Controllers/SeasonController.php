<?php

namespace App\Http\Controllers;

use App\Events\Season\SeasonCreated;
use App\Events\Season\SeasonDeleted;
use App\Events\Season\SeasonUpdated;
use App\Http\Requests\Season\SeasonSetActiveRequest;
use App\Http\Requests\Season\SeasonStoreRequest;
use App\Http\Requests\Season\SeasonUpdateRequest;
use App\Http\Resources\Season\SeasonCollection;
use App\Http\Resources\Season\SeasonResource;
use App\Queries\Season\SeasonsQuery;
use App\Services\Season\SeasonServiceInterface;

class SeasonController extends Controller
{
    /**
     * @var \App\Services\Season\SeasonServiceInterface
     */
    public $seasonService;

    /**
     * AreaController constructor.
     * @param \App\Services\Season\SeasonServiceInterface $seasonService
     */
    public function __construct(SeasonServiceInterface $seasonService)
    {
        $this->seasonService = $seasonService;
    }

    public function index()
    {
        $seasons = (new SeasonsQuery())->get();

        return view('season.index', compact('seasons'));
    }

    public function create()
    {
        return view('season.create');
    }

    public function store(SeasonStoreRequest $request)
    {
        $data = $request->validated();

        $season = $this->seasonService->createSeason($data);

        return $this->index();
    }

    /**
     * @param int $id
     * @return \App\Http\Resources\Season\SeasonResource
     */
    public function edit($id): SeasonResource
    {
        $season = $this->seasonService->getSeasonById($id);

        return new SeasonResource($season);
    }

    /**
     * @param \App\Http\Requests\Season\SeasonUpdateRequest $request
     * @param int $id
     * @return \App\Http\Resources\Season\SeasonResource
     */
    public function update(SeasonUpdateRequest $request, $id): SeasonResource
    {
        $season = $this->seasonService->updateSeason($request->validated(), $id);

        event(new SeasonUpdated($season));

        return new SeasonResource($season);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \App\Http\Resources\Season\SeasonResource
     * @throws \Exception
     */
    public function destroy($id): SeasonResource
    {
        $season = $this->seasonService->destroySeason($id);

        event(new SeasonDeleted($season));

        return new SeasonResource($season);
    }

    public function setActive(SeasonSetActiveRequest $request)
    {
        $data = $request->validated();

        $result = $this->seasonService->setActive($data['id']);

        return $result ? 'İşlem başarılıdır.' : 'Avtif bir sezon mevcuttur.';
    }
}
