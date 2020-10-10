<?php

namespace App\Repositories\Fixture;

use App\Fixture;
use Illuminate\Database\Eloquent\Builder;

/**
 * @see \App\Providers\AppServiceProvider::repositoryBindings();
 */
class FixtureRepository implements FixtureRepositoryInterface
{
    /**
     * @var \App\Fixture|\Illuminate\Database\Eloquent\Builder
     */
    protected $builder;

    /**
     * @var \App\Fixture
     */
    protected $model;

    public function __construct(Fixture $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritDoc
     */
    public function getModel(): Fixture
    {
        return $this->model;
    }

    /**
     * @inheritDoc
     */
    public function getBuilder()
    {
        return $this->builder = $this->getModel()::query();
    }

    /**
     * @inheritDoc
     */
    public function setBuilder(Builder $builder)
    {
        $this->builder = $builder;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function all($columns = ['*'])
    {
        return $this->getBuilder()->get($columns);
    }

    /**
     * @inheritDoc
     */
    public function findOrFail(int $id): Fixture
    {
        return $this->getBuilder()->findOrfail($id);
    }

    /**
     * @inheritDoc
     */
    public function create(array $attributes): Fixture
    {
        return $this->getBuilder()->create($attributes);
    }

    /**
     * @inheritDoc
     */
    public function update(array $attributes, int $id, array $options = []): Fixture
    {
        $model = $this->findOrFail($id);

        $model->update($attributes, $options);

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function destroy(int $id): Fixture
    {
        $model = $this->findOrFail($id);

        $model->delete();

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function countOrder($team1, $team2, $season, $league): int
    {
        return $this->getBuilder()
            ->orWhere(function ($query) use ($team2, $team1) {
                $query->where('team_1', $team1)->where('team_2', $team2);
            })
            ->orWhere(function ($query) use ($team2, $team1) {
                $query->where('team_1', $team2)->where('team_2', $team1);
            })
            ->count();
    }

    /**
     * @inheritdoc
     */
    public function getFixtureByWeek(int $week, int $seasonId)
    {
        return $this->getBuilder()
            ->with(['team1', 'team2', 'homeTeam'])
            ->where('week', $week)
            ->where('season_id', $seasonId)
            ->get();
    }
}
