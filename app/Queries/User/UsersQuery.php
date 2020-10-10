<?php

namespace App\Queries\User;

use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class UsersQuery extends QueryBuilder
{
    public function __construct(?Request $request = null)
    {
        $userRepository = resolve(UserRepositoryInterface::class);

        $builder = $userRepository->getBuilder();

        parent::__construct($builder, $request);

        $this
            ->allowedSorts([
                'created_at'
            ])->allowedFilters([
                AllowedFilter::exact('id'),
            ]);
    }
}
