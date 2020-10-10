<?php

namespace App\Repositories\Season;

use App\Season;
use Illuminate\Database\Eloquent\Builder;

/**
 * @see \App\Providers\AppServiceProvider::repositoryBindings();
 */
class SeasonRepository implements SeasonRepositoryInterface
{
    /**
     * @var \App\Season|\Illuminate\Database\Eloquent\Builder
     */
    protected $builder;

    /**
     * @var \App\Season
     */
    protected $model;

    public function __construct(Season $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritDoc
     */
    public function getModel(): Season
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
    public function findOrFail(int $id): Season
    {
        return $this->getBuilder()->findOrfail($id);
    }

    /**
     * @inheritDoc
     */
    public function create(array $attributes): Season
    {
        return $this->getBuilder()->create($attributes);
    }

    /**
     * @inheritDoc
     */
    public function update(array $attributes, int $id, array $options = []): Season
    {
        $model = $this->findOrFail($id);

        $model->update($attributes, $options);

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function destroy(int $id): Season
    {
        $model = $this->findOrFail($id);

        $model->delete();

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function checkActive(int $id): bool
    {
        return $this->getBuilder()->where('is_active', true)
            ->exists();
    }

    /**
     * @inheritDoc
     */
    public function getNotFinished()
    {
        return $this->getBuilder()
            ->with(['league'])
            ->where('is_active', true)
            ->where('is_done', false)
            ->get();
    }
}
