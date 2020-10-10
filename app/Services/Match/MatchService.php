<?php

namespace App\Services\Match;

use App\Match;
use App\Repositories\Match\MatchRepositoryInterface;
use App\Services\Score\ScoreServiceInterface;
use App\Services\Team\TeamServiceInterface;

class MatchService implements MatchServiceInterface
{
    /**
     * @var \App\Repositories\Match\MatchRepositoryInterface
     */
    public $matchRepository;
    /**
     * @var \App\Services\Team\TeamServiceInterface
     */
    public $teamService;
    /**
     * @var \App\Services\Score\ScoreServiceInterface
     */
    public $scoreService;

    /**
     * @param \App\Repositories\Match\MatchRepositoryInterface $matchRepository
     * @param \App\Services\Team\TeamServiceInterface $teamService
     * @param \App\Services\Score\ScoreServiceInterface $scoreService
     */
    public function __construct(
        MatchRepositoryInterface $matchRepository,
        TeamServiceInterface $teamService,
        ScoreServiceInterface $scoreService
    )
    {
        $this->matchRepository = $matchRepository;
        $this->teamService = $teamService;
        $this->scoreService = $scoreService;
    }

    /**
     * @inheritDoc
     */
    public function createMatch(array $data): Match
    {
        $match = $this->matchRepository->create($data);

        return $match;
    }

    /**
     * @inheritDoc
     */
    public function getMatchById(int $id): Match
    {
        return $this->matchRepository->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function updateMatch(array $data, int $id): Match
    {
        $match = $this->matchRepository->update($data, $id);

        return $match;
    }

    /**
     * @inheritDoc
     */
    public function destroyMatch(int $id): Match
    {
        $match = $this->matchRepository->destroy($id);

        return $match;
    }

    public function recordResult(
        int $team1,
        int $team2,
        int $homeTeamId,
        int $winnerId,
        int $seasonId,
        int $leagueId,
        int $team1Goal,
        int $team2Goal,
        $starts_at): void
    {
        $this->matchRepository->create([
            'team_1' => $team1,
            'team_2' => $team2,
            'season_id' => $seasonId,
            'league_id' => $leagueId,
            'team_1_goal' => $team1Goal,
            'team_2_goal' => $team2Goal,
            'winner_id' => $winnerId,
            'starts_at' => $starts_at
        ]);

        $this->teamService->addGoal($team1, $team1Goal, $team2Goal);
        $this->teamService->addGoal($team2, $team2Goal, $team1Goal);

        $this->scoreService->syncScore($seasonId, $leagueId, $winnerId, $team1, $team2, $team1Goal, $team2Goal);
    }
}
