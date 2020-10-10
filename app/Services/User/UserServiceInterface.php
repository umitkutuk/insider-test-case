<?php

namespace App\Services\User;

use App\User;

interface UserServiceInterface
{
    /**
     * @param array $data
     * @return \App\User
     */
    public function createUser(array $data): User;

    /**
     * @param int $id
     * @return \App\User
     */
    public function getUserById(int $id): User;

    /**
     * @param array $data
     * @param int $id
     * @return \App\User
     */
    public function updateUser(array $data, int $id): User;

    /**
     * @param int $id
     * @return \App\User
     * @throws \Exception
     */
    public function destroyUser(int $id): User;
}
