<?php

namespace App\Services\Match;

use App\Match;

interface MatchServiceInterface
{
    /**
     * @param array $data
     * @return \App\Match
     */
    public function createMatch(array $data): Match;

    /**
     * @param int $id
     * @return \App\Match
     */
    public function getMatchById(int $id): Match;

    /**
     * @param array $data
     * @param int $id
     * @return \App\Match
     */
    public function updateMatch(array $data, int $id): Match;

    /**
     * @param int $id
     * @return \App\Match
     * @throws \Exception
     */
    public function destroyMatch(int $id): Match;
}
