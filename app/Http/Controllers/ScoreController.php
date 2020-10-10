<?php

namespace App\Http\Controllers;

use App\Events\Score\ScoreCreated;
use App\Events\Score\ScoreDeleted;
use App\Events\Score\ScoreUpdated;
use App\Http\Requests\Score\ScoreStoreRequest;
use App\Http\Requests\Score\ScoreUpdateRequest;
use App\Http\Resources\Score\ScoreCollection;
use App\Http\Resources\Score\ScoreResource;
use App\Queries\Score\ScoresQuery;
use App\Services\Score\ScoreServiceInterface;

class ScoreController extends Controller
{
    /**
     * @var \App\Services\Score\ScoreServiceInterface
     */
    public $scoreService;

    /**
     * AreaController constructor.
     * @param \App\Services\Score\ScoreServiceInterface $scoreService
     */
    public function __construct(ScoreServiceInterface $scoreService)
    {
        $this->scoreService = $scoreService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\Score\ScoreCollection
     */
    public function index(): ScoreCollection
    {
        $scores = (new ScoresQuery())->safelyPaginate();

        return new ScoreCollection($scores);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Score\ScoreStoreRequest $request
     * @return \App\Http\Resources\Score\ScoreResource
     */
    public function store(ScoreStoreRequest $request): ScoreResource
    {
        $data = $request->validated();

        $score = $this->scoreService->createScore($data);

        event(new ScoreCreated($score));

        return new ScoreResource($score);
    }

    /**
     * @param int $id
     * @return \App\Http\Resources\Score\ScoreResource
     */
    public function show($id): ScoreResource
    {
        $score = $this->scoreService->getScoreById($id);

        return new ScoreResource($score);
    }

    /**
     * @param \App\Http\Requests\Score\ScoreUpdateRequest $request
     * @param int $id
     * @return \App\Http\Resources\Score\ScoreResource
     */
    public function update(ScoreUpdateRequest $request, $id): ScoreResource
    {
        $score = $this->scoreService->updateScore($request->validated(), $id);

        event(new ScoreUpdated($score));

        return new ScoreResource($score);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \App\Http\Resources\Score\ScoreResource
     * @throws \Exception
     */
    public function destroy($id): ScoreResource
    {
        $score = $this->scoreService->destroyScore($id);

        event(new ScoreDeleted($score));

        return new ScoreResource($score);
    }
}
