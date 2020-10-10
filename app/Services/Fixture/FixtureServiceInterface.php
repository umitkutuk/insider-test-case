<?php

namespace App\Services\Fixture;

use App\Fixture;
use App\Season;

interface FixtureServiceInterface
{
    /**
     * @param array $data
     * @return \App\Fixture
     */
    public function createFixture(array $data): Fixture;

    /**
     * @param int $id
     * @return \App\Fixture
     */
    public function getFixtureById(int $id): Fixture;

    /**
     * @param array $data
     * @param int $id
     * @return \App\Fixture
     */
    public function updateFixture(array $data, int $id): Fixture;

    /**
     * @param int $id
     * @return \App\Fixture
     * @throws \Exception
     */
    public function destroyFixture(int $id): Fixture;

    /**
     * @param \App\Season $season
     * @return bool
     */
    public function generateFixture(Season $season): bool;

    /**
     * @param int $team1
     * @param int $team2
     * @param int $season
     * @param int $league
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
