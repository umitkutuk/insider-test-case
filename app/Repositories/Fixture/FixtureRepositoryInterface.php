<?php

namespace App\Repositories\Fixture;

use App\Fixture;
use Illuminate\Database\Eloquent\Builder;

/**
 * @see \App\Providers\AppServiceProvider::repositoryBindings();
 */
interface FixtureRepositoryInterface
{
    /**
     * @return \App\Fixture
     */
    public function getModel(): Fixture;

    /**
     * @return \App\Fixture|\Illuminate\Database\Eloquent\Builder
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
     * @return \App\Fixture[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all($columns = ['*']);

    /**
     * Find a model by its primary key or throw an exception.
     *
     * @param int $id
     * @return \App\Fixture
     */
    public function findOrFail(int $id): Fixture;

    /**
     * Store a newly created resource in storage.
     *
     * @param array $attributes
     * @return \App\Fixture
     */
    public function create(array $attributes): Fixture;

    /**
     * Update the specified resource in storage.
     *
     * @param array $attributes
     * @param int $id
     * @param array $options
     * @return \App\Fixture
     */
    public function update(array $attributes, int $id, array $options = []): Fixture;

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \App\Fixture
     * @throws \Exception
     */
    public function destroy(int $id): Fixture;

    /**
     * @param $team1
     * @param $team2
     * @param $season
     * @param $league
     * @return int
     */
    public function countOrder(int $team1, int $team2, int $season, int $league): int;

    /**
     * @param int $week
     * @param int $seasonId
     * @return \App\Fixture[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getFixtureByWeek(int $week, int $seasonId);

    /**
     * @param int $team1
     * @param int $team2
     * @param int $week
     * @param int $seasonId
     * @param int $leagueId
     * @return bool
     */
    public function fixtureExists(int $team1, int $team2, int $week, int $seasonId, int $leagueId): bool;

    /**
     * @param int $team1
     * @param int $team2
     * @param int $seasonId
     * @param int $leagueId
     * @return mixed
     */
    public function getFixtureForHomeTeam(int $team1, int $team2, int $seasonId, int $leagueId);
}
