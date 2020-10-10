<?php

namespace App\Http\Controllers;

use App\Events\Fixture\FixtureCreated;
use App\Events\Fixture\FixtureDeleted;
use App\Events\Fixture\FixtureUpdated;
use App\Http\Requests\Fixture\FixtureStoreRequest;
use App\Http\Requests\Fixture\FixtureUpdateRequest;
use App\Http\Resources\Fixture\FixtureCollection;
use App\Http\Resources\Fixture\FixtureResource;
use App\Queries\Fixture\FixturesQuery;
use App\Services\Fixture\FixtureServiceInterface;

class FixtureController extends Controller
{
    /**
     * @var \App\Services\Fixture\FixtureServiceInterface
     */
    public $fixtureService;

    /**
     * AreaController constructor.
     * @param \App\Services\Fixture\FixtureServiceInterface $fixtureService
     */
    public function __construct(FixtureServiceInterface $fixtureService)
    {
        $this->fixtureService = $fixtureService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $fixtures = (new FixturesQuery())->get();

        return view('fixture.index', compact('fixtures'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Fixture\FixtureStoreRequest $request
     * @return \App\Http\Resources\Fixture\FixtureResource
     */
    public function store(FixtureStoreRequest $request): FixtureResource
    {
        $data = $request->validated();

        $fixture = $this->fixtureService->createFixture($data);

        event(new FixtureCreated($fixture));

        return new FixtureResource($fixture);
    }

    /**
     * @param int $id
     * @return \App\Http\Resources\Fixture\FixtureResource
     */
    public function show($id): FixtureResource
    {
        $fixture = $this->fixtureService->getFixtureById($id);

        return new FixtureResource($fixture);
    }

    /**
     * @param \App\Http\Requests\Fixture\FixtureUpdateRequest $request
     * @param int $id
     * @return \App\Http\Resources\Fixture\FixtureResource
     */
    public function update(FixtureUpdateRequest $request, $id): FixtureResource
    {
        $fixture = $this->fixtureService->updateFixture($request->validated(), $id);

        event(new FixtureUpdated($fixture));

        return new FixtureResource($fixture);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \App\Http\Resources\Fixture\FixtureResource
     * @throws \Exception
     */
    public function destroy($id): FixtureResource
    {
        $fixture = $this->fixtureService->destroyFixture($id);

        event(new FixtureDeleted($fixture));

        return new FixtureResource($fixture);
    }
}
