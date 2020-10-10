<?php

namespace App\Repositories\Fixture;

use App\Fixture;
use Illuminate\Database\Eloquent\Builder;

/**
 * @see \App\Providers\AppServiceProvider::repositoryBindings();
 */
class FixtureRepository implements FixtureRepositoryInterface
{
    /**
     * @var \App\Fixture|\Illuminate\Database\Eloquent\Builder
     */
    protected $builder;

    /**
     * @var \App\Fixture
     */
    protected $model;

    public function __construct(Fixture $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritDoc
     */
    public function getModel(): Fixture
    {
        return $this->model;
    }

    /**
     * @inheritDoc
     */
    public function getBuilder()
    {
        return $this->builder = $this->getModel()::query();
    }

    /**
     * @inheritDoc
     */
    public function setBuilder(Builder $builder)
    {
        $this->builder = $builder;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function all($columns = ['*'])
    {
        return $this->getBuilder()->get($columns);
    }

    /**
     * @inheritDoc
     */
    public function findOrFail(int $id): Fixture
    {
        return $this->getBuilder()->findOrfail($id);
    }

    /**
     * @inheritDoc
     */
    public function create(array $attributes): Fixture
    {
        return $this->getBuilder()->create($attributes);
    }

    /**
     * @inheritDoc
     */
    public function update(array $attributes, int $id, array $options = []): Fixture
    {
        $model = $this->findOrFail($id);

        $model->update($attributes, $options);

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function destroy(int $id): Fixture
    {
        $model = $this->findOrFail($id);

        $model->delete();

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function countOrder($team1, $team2, $season, $league): int
    {
        return $this->getBuilder()
            ->orWhere(function ($query) use ($team2, $team1) {
                $query->where('team_1', $team1)->where('team_2', $team2);
            })
            ->orWhere(function ($query) use ($team2, $team1) {
                $query->where('team_1', $team2)->where('team_2', $team1);
            })
            ->count();
    }

    /**
     * @inheritdoc
     */
    public function getFixtureByWeek(int $week, int $seasonId)
    {
        return $this->getBuilder()
            ->with(['team1', 'team2', 'homeTeam'])
            ->where('week', $week)
            ->where('season_id', $seasonId)
            ->get();
    }

    /**
     * @inheritdoc
     */
    public function fixtureExists(int $team1, int $team2, int $week, int $seasonId, int $leagueId): bool
    {
        $t1 =  $this->getBuilder()
            ->where(function ($query) use ($team2, $team1) {
                $query->orWhere(function ($q) use ($team2, $team1) {
                    $q
                        ->where('team_1', $team1)
                        ->where('team_2', $team2);
                });

                $query->orWhere(function ($q) use ($team2, $team1) {
                    $q->where('team_1', $team2)
                        ->where('team_2', $team1);
                });
            })
            ->where('season_id', $seasonId)
            ->where('league_id', $leagueId)
            ->exists();

        $t2 =  $this->getBuilder()
            ->where(function ($query) use ($week, $team2, $team1) {
                $query->orWhere(function ($q) use ($week, $team2, $team1) {
                    $q
                        ->where('team_1', $team1)
                        ->where('week', $week);
                });

                $query->orWhere(function ($q) use ($week, $team2, $team1) {
                    $q->orWhere('team_2', $team2)
                        ->where('week', $week);
                });
            })
            ->where(function ($query) use ($week, $team2, $team1) {
                $query->orWhere(function ($q) use ($week, $team2, $team1) {
                    $q
                        ->where('team_1', $team2)
                        ->where('week', $week);
                });

                $query->orWhere(function ($q) use ($week, $team2, $team1) {
                    $q->orWhere('team_2', $team1)
                        ->where('week', $week);
                });
            })
            ->where('season_id', $seasonId)
            ->where('league_id', $leagueId)
            ->exists();

        return $t2 || $t1;
    }

    /**
     * @inheritdoc
     */
    public function getFixtureForHomeTeam(int $team1, int $team2, int $seasonId, int $leagueId)
    {
        return $this->getBuilder()
            ->where('team_1', $team1)
            ->where('team_2', $team2)
            ->where('season_id', $seasonId)
            ->where('league_id', $leagueId)
            ->first();
    }
}
