<?php

namespace App\Services\Team;

use App\Repositories\Team\TeamRepositoryInterface;
use App\Team;

class TeamService implements TeamServiceInterface
{
    /**
     * @var \App\Repositories\Team\TeamRepositoryInterface
     */
    public $teamRepository;

    /**
     * @param \App\Repositories\Team\TeamRepositoryInterface $teamRepository
     */
    public function __construct(TeamRepositoryInterface $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    /**
     * @inheritDoc
     */
    public function createTeam(array $data): Team
    {
        $team = $this->teamRepository->create($data);

        return $team;
    }

    /**
     * @inheritDoc
     */
    public function getTeamById(int $id): Team
    {
        return $this->teamRepository->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function updateTeam(array $data, int $id): Team
    {
        $team = $this->teamRepository->update($data, $id);

        return $team;
    }

    /**
     * @inheritDoc
     */
    public function destroyTeam(int $id): Team
    {
        $team = $this->teamRepository->destroy($id);

        return $team;
    }

    /**
     * @inheritDoc
     */
    public function getTeamsByLeagueId(int $id)
    {
        return $this->teamRepository->getTeamsByLeagueId($id);
    }

    /**
     * @inheritdoc
     */
    public function addPower(int $id, int $power): Team
    {
        $team = $this->teamRepository->findOrFail($id);

        $team->power += $power;
        $team->save();

        return $team;
    }

    /**
     * @inheritdoc
     */
    public function addGoal(int $team1, int $team1Goal, int $team2goal): void
    {
        $team = $this->teamRepository->findOrFail($team1);

        $team->total_positive_goal += $team1Goal;
        $team->total_negative_goal += $team2goal;
        $team->match_count += 1;
        $team->save();

        $team->goal_average = $team->total_positive_goal - $team->total_negative_goal;
        $team->save();
    }
}
