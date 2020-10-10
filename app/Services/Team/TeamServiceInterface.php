<?php

namespace App\Services\Team;

use App\Team;

interface TeamServiceInterface
{
    /**
     * @param array $data
     * @return \App\Team
     */
    public function createTeam(array $data): Team;

    /**
     * @param int $id
     * @return \App\Team
     */
    public function getTeamById(int $id): Team;

    /**
     * @param array $data
     * @param int $id
     * @return \App\Team
     */
    public function updateTeam(array $data, int $id): Team;

    /**
     * @param int $id
     * @return \App\Team
     * @throws \Exception
     */
    public function destroyTeam(int $id): Team;

    /**
     * @param int $id
     * @return mixed
     */
    public function getTeamsByLeagueId(int $id);

    /**
     * @param int $id
     * @param int $power
     * @return \App\Team
     */
    public function addPower(int $id, int $power): Team;

    /**
     * @param int $team1
     * @param int $team1Goal
     * @param int $team2goal
     */
    public function addGoal(int $team1, int $team1Goal, int $team2goal): void;
}
