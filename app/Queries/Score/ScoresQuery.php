<?php

namespace App\Queries\Score;

use App\Repositories\Score\ScoreRepositoryInterface;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ScoresQuery extends QueryBuilder
{
    public function __construct(?Request $request = null)
    {
        // Resolve services, repositories etc. here...
        // $userService = resolve(UserServiceInterface::class);
        $scoreRepository = resolve(ScoreRepositoryInterface::class);

        $builder = $scoreRepository->getBuilder()->with(['team', 'season', 'league'])
            ->whereHas('season', function ($query){
                $query->where('is_active', true)->where('is_done', false);
            });

        parent::__construct($builder, $request);

        // Put your filters, sorts etc. here:
        // $this->allowedFilters(...
        $this
            ->allowedSorts([
                'created_at'
            ])->allowedFilters([
                AllowedFilter::exact('id'),
            ]);
    }
}
