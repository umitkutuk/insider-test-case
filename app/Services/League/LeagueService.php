<?php

namespace App\Services\League;

use App\League;
use App\Repositories\League\LeagueRepositoryInterface;

class LeagueService implements LeagueServiceInterface
{
    /**
     * @var \App\Repositories\League\LeagueRepositoryInterface
     */
    public $leagueRepository;

    /**
     * @param \App\Repositories\League\LeagueRepositoryInterface $leagueRepository
     */
    public function __construct(LeagueRepositoryInterface $leagueRepository)
    {
        $this->leagueRepository = $leagueRepository;
    }

    /**
     * @inheritDoc
     */
    public function createLeague(array $data): League
    {
        $league = $this->leagueRepository->create($data);

        return $league;
    }

    /**
     * @inheritDoc
     */
    public function getLeagueById(int $id): League
    {
        return $this->leagueRepository->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function updateLeague(array $data, int $id): League
    {
        $league = $this->leagueRepository->update($data, $id);

        return $league;
    }

    /**
     * @inheritDoc
     */
    public function destroyLeague(int $id): League
    {
        $league = $this->leagueRepository->destroy($id);

        return $league;
    }
}
