<?php

namespace App\Services\Season;

use App\Season;

interface SeasonServiceInterface
{
    /**
     * @param array $data
     * @return \App\Season
     */
    public function createSeason(array $data): Season;

    /**
     * @param int $id
     * @return \App\Season
     */
    public function getSeasonById(int $id): Season;

    /**
     * @param array $data
     * @param int $id
     * @return \App\Season
     */
    public function updateSeason(array $data, int $id): Season;

    /**
     * @param int $id
     * @return \App\Season
     * @throws \Exception
     */
    public function destroySeason(int $id): Season;

    /**
     * @param int $id
     * @return bool
     */
    public function setActive(int $id): bool;

    /**
     * @return \App\Season[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getNotFinished();
}
