<?php

namespace App\Repositories\League;

use App\League;
use Illuminate\Database\Eloquent\Builder;

/**
 * @see \App\Providers\AppServiceProvider::repositoryBindings();
 */
interface LeagueRepositoryInterface
{
    /**
     * @return \App\League
     */
    public function getModel(): League;

    /**
     * @return \App\League|\Illuminate\Database\Eloquent\Builder
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
     * @return \App\League[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all($columns = ['*']);

    /**
     * Find a model by its primary key or throw an exception.
     *
     * @param int $id
     * @return \App\League
     */
    public function findOrFail(int $id): League;

    /**
     * Store a newly created resource in storage.
     *
     * @param array $attributes
     * @return \App\League
     */
    public function create(array $attributes): League;

    /**
     * Update the specified resource in storage.
     *
     * @param array $attributes
     * @param int $id
     * @param array $options
     * @return \App\League
     */
    public function update(array $attributes, int $id, array $options = []): League;

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \App\League
     * @throws \Exception
     */
    public function destroy(int $id): League;
}
