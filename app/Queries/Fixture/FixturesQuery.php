<?php

namespace App\Queries\Fixture;

use App\Repositories\Fixture\FixtureRepositoryInterface;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class FixturesQuery extends QueryBuilder
{
    public function __construct(?Request $request = null)
    {
        $fixtureRepository = resolve(FixtureRepositoryInterface::class);

        $builder = $fixtureRepository
            ->getBuilder()
            ->with(['team1', 'team2', 'homeTeam', 'season', 'league'])
            ->whereHas('season', function ($query){
                $query->where('is_active', true);
            });

        parent::__construct($builder, $request);


        $this
            ->allowedSorts([
                'created_at'
            ])->allowedFilters([
                AllowedFilter::exact('id'),
            ]);
    }
}
