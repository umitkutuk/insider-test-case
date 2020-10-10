<?php

namespace App\Repositories\Match;

use App\Match;
use Illuminate\Database\Eloquent\Builder;

/**
 * @see \App\Providers\AppServiceProvider::repositoryBindings();
 */
interface MatchRepositoryInterface
{
    /**
     * @return \App\Match
     */
    public function getModel(): Match;

    /**
     * @return \App\Match|\Illuminate\Database\Eloquent\Builder
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
     * @return \App\Match[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all($columns = ['*']);

    /**
     * Find a model by its primary key or throw an exception.
     *
     * @param int $id
     * @return \App\Match
     */
    public function findOrFail(int $id): Match;

    /**
     * Store a newly created resource in storage.
     *
     * @param array $attributes
     * @return \App\Match
     */
    public function create(array $attributes): Match;

    /**
     * Update the specified resource in storage.
     *
     * @param array $attributes
     * @param int $id
     * @param array $options
     * @return \App\Match
     */
    public function update(array $attributes, int $id, array $options = []): Match;

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \App\Match
     * @throws \Exception
     */
    public function destroy(int $id): Match;
}
