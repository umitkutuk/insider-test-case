<?php

namespace App\Services\League;

use App\League;

interface LeagueServiceInterface
{
    /**
     * @param array $data
     * @return \App\League
     */
    public function createLeague(array $data): League;

    /**
     * @param int $id
     * @return \App\League
     */
    public function getLeagueById(int $id): League;

    /**
     * @param array $data
     * @param int $id
     * @return \App\League
     */
    public function updateLeague(array $data, int $id): League;

    /**
     * @param int $id
     * @return \App\League
     * @throws \Exception
     */
    public function destroyLeague(int $id): League;
}
