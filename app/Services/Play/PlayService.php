<?php

namespace App\Services\Play;

use App\Services\Fixture\FixtureServiceInterface;
use App\Services\Match\MatchServiceInterface;
use App\Services\Season\SeasonServiceInterface;
use App\Services\Team\TeamServiceInterface;
use App\Team;

class PlayService implements PlayServiceInterface
{
    /**
     * @var \App\Services\Season\SeasonServiceInterface
     */
    public $seasonService;
    /**
     * @var \App\Services\Fixture\FixtureServiceInterface
     */
    public $fixtureService;
    /**
     * @var \App\Services\Team\TeamServiceInterface
     */
    public $teamService;
    /**
     * @var \App\Services\Match\MatchServiceInterface
     */
    public $matchService;

    /**
     * PlayService constructor.
     * @param \App\Services\Season\SeasonServiceInterface $seasonService
     * @param \App\Services\Fixture\FixtureServiceInterface $fixtureService
     * @param \App\Services\Team\TeamServiceInterface $teamService
     * @param \App\Services\Match\MatchServiceInterface $matchService
     */
    public function __construct(
        SeasonServiceInterface $seasonService,
        FixtureServiceInterface $fixtureService,
        TeamServiceInterface $teamService,
        MatchServiceInterface $matchService
    )
    {
        $this->seasonService = $seasonService;
        $this->fixtureService = $fixtureService;
        $this->teamService = $teamService;
        $this->matchService = $matchService;
    }

    public function playNextWeek()
    {
        //Not finished seasons
        $seasons = $this->seasonService->getNotFinished();

        foreach ($seasons as $season){
            if ($season->week === $season->total_week) continue;

            $week = ($season->league->week ?? 1) + 1;
            $fixtures = $this->fixtureService->getFixtureByWeek($week, $season->id);

            foreach ($fixtures as $fixture){
                $winnerTeam = $this->getWinnerByPrediction($fixture->team1, $fixture->team2);

                //re-set powers
                $this->recalculatePower($fixture->team1, $fixture->team2, $fixture->homeTeam, $winnerTeam);

                // TODO - Goals ???
                $this->matchService->recordResult($fixture->team_1, $fixture->team_2, $fixture->home_team_id, $winnerTeam->id, $fixture->season_id, $fixture->league_id, 3, 2, $fixture->starts_at);
            }

            $season->week += 1;
            $season->save();

        }
    }

    /**
     * @inheritdoc
     */
    public function getWinnerByPrediction(Team $team1, Team $team2): Team
    {
        $team1Prediction = ($team1->power * random_int(1, 10)/10);
        $team2Prediction = ($team2->power * random_int(1, 10)/10);

        return $team1Prediction > $team2Prediction
            ? $team1
            : $team2;
    }

    /**
     * @inheritdoc
     */
    public function recalculatePower(Team $team1, Team $team2, Team $homeTeam, Team $winnerTeam): void
    {
        $winnerPower = $homeTeam->id === $winnerTeam->id ? 0 : 1;

        if ($team1->id === $winnerTeam->id){
            $this->teamService->addPower($team1->id, ($winnerPower+1));
            $this->teamService->addPower($team2->id, -($winnerPower+1));
        }else{
            $this->teamService->addPower($team2->id, ($winnerPower+1));
            $this->teamService->addPower($team1->id, -($winnerPower+1));
        }
    }
}
