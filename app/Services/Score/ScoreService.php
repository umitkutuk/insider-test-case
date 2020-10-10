<?php

namespace App\Services\Score;

use App\Repositories\Score\ScoreRepositoryInterface;
use App\Score;
use App\Services\Team\TeamServiceInterface;

class ScoreService implements ScoreServiceInterface
{
    /**
     * @var \App\Repositories\Score\ScoreRepositoryInterface
     */
    public $scoreRepository;
    /**
     * @var \App\Services\Team\TeamServiceInterface
     */
    public $teamService;

    /**
     * @param \App\Repositories\Score\ScoreRepositoryInterface $scoreRepository
     * @param \App\Services\Team\TeamServiceInterface $teamService
     */
    public function __construct(
        ScoreRepositoryInterface $scoreRepository,
        TeamServiceInterface $teamService
    )
    {
        $this->scoreRepository = $scoreRepository;
        $this->teamService = $teamService;
    }

    /**
     * @inheritDoc
     */
    public function createScore(array $data): Score
    {
        $score = $this->scoreRepository->create($data);

        return $score;
    }

    /**
     * @inheritDoc
     */
    public function getScoreById(int $id): Score
    {
        return $this->scoreRepository->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function updateScore(array $data, int $id): Score
    {
        $score = $this->scoreRepository->update($data, $id);

        return $score;
    }

    /**
     * @inheritDoc
     */
    public function destroyScore(int $id): Score
    {
        $score = $this->scoreRepository->destroy($id);

        return $score;
    }

    /**
     * @inheritDoc
     */
    public function syncScore(int $seasonId, int $leagueId, int $winnerId, int $team_1, int $team_2, int $team1Goal, int $team2Goal): void
    {
        $score1 = $this->getScore($team_1, $seasonId, $leagueId);
        $score2 = $this->getScore($team_2, $seasonId, $leagueId);

        if ($winnerId === $team_1) {
            $score1->score +=3;
            $score1->total_positive_goal +=$team1Goal;
            $score1->total_negative_goal +=$team2Goal;
            $score1->save();

            $score1->goal_average = $score1->total_positive_goal - $score1->total_negative_goal;
            $score1->save();



            $score2->total_positive_goal +=$team2Goal;
            $score2->total_negative_goal +=$team1Goal;
            $score2->save();

            $score2->goal_average = $score2->total_positive_goal - $score2->total_negative_goal;
            $score2->save();
        }

        if ($winnerId === $team_2) {
            $score2->score +=3;
            $score2->total_positive_goal +=$team2Goal;
            $score2->total_negative_goal +=$team1Goal;
            $score2->save();

            $score1->total_positive_goal +=$team1Goal;
            $score1->total_negative_goal +=$team2Goal;
            $score1->save();
        }
    }

    /**
     * @inheritDoc
     */
    public function getScore(int $team, int $seasonId, int $leagueId)
    {
        return $this->scoreRepository->getScore($team, $seasonId, $leagueId);
    }
}
