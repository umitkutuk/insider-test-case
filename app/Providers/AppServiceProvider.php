<?php

namespace App\Providers;

use App\Repositories\Fixture\FixtureRepository;
use App\Repositories\Fixture\FixtureRepositoryInterface;
use App\Repositories\League\LeagueRepository;
use App\Repositories\League\LeagueRepositoryInterface;
use App\Repositories\Match\MatchRepository;
use App\Repositories\Match\MatchRepositoryInterface;
use App\Repositories\Score\ScoreRepository;
use App\Repositories\Score\ScoreRepositoryInterface;
use App\Repositories\Season\SeasonRepository;
use App\Repositories\Season\SeasonRepositoryInterface;
use App\Repositories\Team\TeamRepository;
use App\Repositories\Team\TeamRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\Fixture\FixtureService;
use App\Services\Fixture\FixtureServiceInterface;
use App\Services\Play\PlayService;
use App\Services\Play\PlayServiceInterface;
use App\Services\League\LeagueService;
use App\Services\League\LeagueServiceInterface;
use App\Services\Match\MatchService;
use App\Services\Match\MatchServiceInterface;
use App\Services\Score\ScoreService;
use App\Services\Score\ScoreServiceInterface;
use App\Services\Season\SeasonService;
use App\Services\Season\SeasonServiceInterface;
use App\Services\Team\TeamService;
use App\Services\Team\TeamServiceInterface;
use App\Services\User\UserService;
use App\Services\User\UserServiceInterface;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Builder as DatabaseEloquentBuilder;
use Illuminate\Database\Query\Builder as DatabaseQueryBuilder;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->repositoryBindings();

        $this->resolverBindings();

        $this->serviceBindings();
    }

    /**
     * Repository bindings
     */
    protected function repositoryBindings(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(LeagueRepositoryInterface::class, LeagueRepository::class);
        $this->app->bind(SeasonRepositoryInterface::class, SeasonRepository::class);
        $this->app->bind(TeamRepositoryInterface::class, TeamRepository::class);
        $this->app->bind(MatchRepositoryInterface::class, MatchRepository::class);
        $this->app->bind(FixtureRepositoryInterface::class, FixtureRepository::class);
        $this->app->bind(ScoreRepositoryInterface::class, ScoreRepository::class);
        //...
    }

    /**
     * Service bindings
     */
    protected function serviceBindings(): void
    {
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(LeagueServiceInterface::class, LeagueService::class);
        $this->app->bind(LeagueServiceInterface::class, LeagueService::class);
        $this->app->bind(SeasonServiceInterface::class, SeasonService::class);
        $this->app->bind(TeamServiceInterface::class, TeamService::class);
        $this->app->bind(MatchServiceInterface::class, MatchService::class);
        $this->app->bind(FixtureServiceInterface::class, FixtureService::class);
        $this->app->bind(PlayServiceInterface::class, PlayService::class);
        $this->app->bind(ScoreServiceInterface::class, ScoreService::class);
        //...
    }

    /**
     * Resolver bindings
     */
    protected function resolverBindings()
    {
        //...
    }


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerDatabaseBuilderMacros();
        //
    }

    /**
     * Register database related macros
     * Please add entries to _ide_helper_macros.php
     */
    protected function registerDatabaseBuilderMacros()
    {
        /** @see \App\Http\Middleware\CheckPerPageQueryParameterForPagination::handle() */
        DatabaseEloquentBuilder::macro('safelyPaginate', function ($perPage = null, $columns = ['*'], $pageName = 'page', $page = null) {

            $options = config('pagination');

            $perPage = $perPage ?? request($options['param_name']) ?? $options['per_page'];

            /** @var \Illuminate\Database\Eloquent\Builder $this */
            return $this->paginate($perPage, $columns, $pageName, $page);
        });

        /** @see \App\Http\Middleware\CheckPerPageQueryParameterForPagination::handle() */
        DatabaseQueryBuilder::macro('safelyPaginate', function ($perPage = null, $columns = ['*'], $pageName = 'page', $page = null) {

            $options = config('pagination');

            $perPage = $perPage ?? request($options['param_name']) ?? $options['per_page'];

            /** @var \Illuminate\Database\Query\Builder $this */
            return $this->paginate($perPage, $columns, $pageName, $page);
        });

        //...
    }

}
