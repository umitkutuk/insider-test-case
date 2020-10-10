<?php

namespace App\Services\Play;

use App\Team;

interface PlayServiceInterface
{
    /**
     * @return string
     * @throws \Exception
     */
    public function playNextWeek(): string;

    /**
     * @param \App\Team $team1
     * @param \App\Team $team2
     * @return \App\Team
     * @throws \Exception
     */
    public function getWinnerByPrediction(Team $team1, Team $team2): Team;

    /**
     * @param \App\Team $team1
     * @param \App\Team $team2
     * @param \App\Team $homeTeam
     * @param \App\Team $winnerTeam
     */
    public function recalculatePower(Team $team1, Team $team2, Team $homeTeam, Team $winnerTeam): void;
}
