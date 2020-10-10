<?php

namespace App\Repositories\Score;

use App\Score;
use Illuminate\Database\Eloquent\Builder;

/**
 * @see \App\Providers\AppServiceProvider::repositoryBindings();
 */
interface ScoreRepositoryInterface
{
    /**
     * @return \App\Score
     */
    public function getModel(): Score;

    /**
     * @return \App\Score|\Illuminate\Database\Eloquent\Builder
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
     * @return \App\Score[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all($columns = ['*']);

    /**
     * Find a model by its primary key or throw an exception.
     *
     * @param int $id
     * @return \App\Score
     */
    public function findOrFail(int $id): Score;

    /**
     * Store a newly created resource in storage.
     *
     * @param array $attributes
     * @return \App\Score
     */
    public function create(array $attributes): Score;

    /**
     * Update the specified resource in storage.
     *
     * @param array $attributes
     * @param int $id
     * @param array $options
     * @return \App\Score
     */
    public function update(array $attributes, int $id, array $options = []): Score;

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \App\Score
     * @throws \Exception
     */
    public function destroy(int $id): Score;

    /**
     * @param int $team
     * @param int $seasonId
     * @param int $leagueId
     * @return \App\Score|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function getScore(int $team, int $seasonId, int $leagueId);

}
