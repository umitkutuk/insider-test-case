<?php

namespace App\Providers;

use App\Repositories\League\LeagueRepository;
use App\Repositories\League\LeagueRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\League\LeagueService;
use App\Services\League\LeagueServiceInterface;
use App\Services\User\UserService;
use App\Services\User\UserServiceInterface;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ServiceContainerProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
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
        //...
    }

    /**
     * Service bindings
     */
    protected function serviceBindings(): void
    {
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(LeagueServiceInterface::class, LeagueService::class);
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
     * @inheritDoc
     */
    public function provides()
    {
        return [
            //Repository
            UserRepositoryInterface::class,
            LeagueRepositoryInterface::class,

            //Service
            UserServiceInterface::class,
            LeagueServiceInterface::class,

            //Resolver

        ];
    }
}
