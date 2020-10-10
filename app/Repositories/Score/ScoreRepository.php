<?php

namespace App\Repositories\Score;

use App\Score;
use Illuminate\Database\Eloquent\Builder;

/**
 * @see \App\Providers\AppServiceProvider::repositoryBindings();
 */
class ScoreRepository implements ScoreRepositoryInterface
{
    /**
     * @var \App\Score|\Illuminate\Database\Eloquent\Builder
     */
    protected $builder;

    /**
     * @var \App\Score
     */
    protected $model;

    public function __construct(Score $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritDoc
     */
    public function getModel(): Score
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
    public function findOrFail(int $id): Score
    {
        return $this->getBuilder()->findOrfail($id);
    }

    /**
     * @inheritDoc
     */
    public function create(array $attributes): Score
    {
        return $this->getBuilder()->create($attributes);
    }

    /**
     * @inheritDoc
     */
    public function update(array $attributes, int $id, array $options = []): Score
    {
        $model = $this->findOrFail($id);

        $model->update($attributes, $options);

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function destroy(int $id): Score
    {
        $model = $this->findOrFail($id);

        $model->delete();

        return $model;
    }

    /**
     * @inheritdoc
     */
    public function getScore(int $team, int $seasonId, int $leagueId)
    {
        return $this->getBuilder()
            ->where('team_id', $team)
            ->where('season_id', $seasonId)
            ->where('league_id', $leagueId)
            ->firstOrFail();
    }
}
