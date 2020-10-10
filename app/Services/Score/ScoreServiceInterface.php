<?php

namespace App\Services\Score;

use App\Score;

interface ScoreServiceInterface
{
    /**
     * @param array $data
     * @return \App\Score
     */
    public function createScore(array $data): Score;

    /**
     * @param int $id
     * @return \App\Score
     */
    public function getScoreById(int $id): Score;

    /**
     * @param array $data
     * @param int $id
     * @return \App\Score
     */
    public function updateScore(array $data, int $id): Score;

    /**
     * @param int $id
     * @return \App\Score
     * @throws \Exception
     */
    public function destroyScore(int $id): Score;

    /**
     * @param int $team
     * @param int $seasonId
     * @param int $leagueId
     * @return mixed
     */
    public function getScore(int $team, int $seasonId, int $leagueId);

    /**
     * @param int $seasonId
     * @param int $leagueId
     * @param int $winnerId
     * @param int $team_1
     * @param int $team_2
     * @param int $team1Goal
     * @param int $team2Goal
     */
    public function syncScore(int $seasonId, int $leagueId, int $winnerId, int $team_1, int $team_2, int $team1Goal, int $team2Goal): void;
}
