<?php

namespace App\Repositories\Season;

use App\Season;
use Illuminate\Database\Eloquent\Builder;

/**
 * @see \App\Providers\AppServiceProvider::repositoryBindings();
 */
interface SeasonRepositoryInterface
{
    /**
     * @return \App\Season
     */
    public function getModel(): Season;

    /**
     * @return \App\Season|\Illuminate\Database\Eloquent\Builder
     */
    public function getBuilder();

    /**
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return $this
     */
    public function setBuilder(Builder $builder);

    /**
     * Get all of the models from the database.
     *
     * @param string[] $columns
     * @return \App\Season[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all($columns = ['*']);

    /**
     * Find a model by its primary key or throw an exception.
     *
     * @param int $id
     * @return \App\Season
     */
    public function findOrFail(int $id): Season;

    /**
     * Store a newly created resource in storage.
     *
     * @param array $attributes
     * @return \App\Season
     */
    public function create(array $attributes): Season;

    /**
     * Update the specified resource in storage.
     *
     * @param array $attributes
     * @param int $id
     * @param array $options
     * @return \App\Season
     */
    public function update(array $attributes, int $id, array $options = []): Season;

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \App\Season
     * @throws \Exception
     */
    public function destroy(int $id): Season;

    /**
     * @param int $id
     * @return bool
     */
    public function checkActive(int $id): bool;

    /**
     * @return \App\Season[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getNotFinished();
}
