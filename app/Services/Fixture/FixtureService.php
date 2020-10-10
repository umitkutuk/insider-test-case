<?php

namespace App\Services\Fixture;

use App\Fixture;
use App\Repositories\Fixture\FixtureRepositoryInterface;
use App\Repositories\League\LeagueRepositoryInterface;
use App\Season;
use App\Services\League\LeagueServiceInterface;
use App\Services\Score\ScoreServiceInterface;
use App\Services\Team\TeamServiceInterface;
use Carbon\Carbon;

class FixtureService implements FixtureServiceInterface
{
    /**
     * @var \App\Repositories\Fixture\FixtureRepositoryInterface
     */
    public $fixtureRepository;

    /**
     * @var \App\Repositories\League\LeagueRepositoryInterface
     */
    public $leagueRepository;
    /**
     * @var \App\Services\Team\TeamServiceInterface
     */
    public $teamService;
    /**
     * @var \App\Services\Fixture\FixtureServiceInterface
     */
    public $fixtureService;

    /**
     * @var \App\Services\Score\ScoreServiceInterface|\Illuminate\Contracts\Foundation\Application|mixed
     */
    public $scoreService;

    /**
     * @param \App\Repositories\Fixture\FixtureRepositoryInterface $fixtureRepository
     */
    public function __construct(
        FixtureRepositoryInterface $fixtureRepository
    )
    {
        $this->fixtureRepository = $fixtureRepository;
        $this->leagueRepository = resolve(LeagueRepositoryInterface::class);
        $this->teamService = resolve(TeamServiceInterface::class);
        $this->scoreService = resolve(ScoreServiceInterface::class);
    }

    /**
     * @inheritDoc
     */
    public function createFixture(array $data): Fixture
    {
        $fixture = $this->fixtureRepository->create($data);

        return $fixture;
    }

    /**
     * @inheritDoc
     */
    public function getFixtureById(int $id): Fixture
    {
        return $this->fixtureRepository->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function updateFixture(array $data, int $id): Fixture
    {
        $fixture = $this->fixtureRepository->update($data, $id);

        return $fixture;
    }

    /**
     * @inheritDoc
     */
    public function destroyFixture(int $id): Fixture
    {
        $fixture = $this->fixtureRepository->destroy($id);

        return $fixture;
    }

    /**
     * @inheritDoc
     */
    public function generateFixture(Season $season): bool
    {
        $startsAt = $season->stats_at;
        $teams = $this->teamService->getTeamsByLeagueId($season->league_id);

        foreach ($teams as $team) {
            $this->scoreService->createScore([
                'season_id' => $season->id,
                'league_id' => $season->league_id,
                'team_id' => $team->id,
                'score' => 0
            ]);

            $week = 1;
            foreach ($teams as  $t) {
                if ($team->id === $t->id) continue;

                $order = $this->countOrder($team->id, $t->id, $season->id, $season->league_id);
                $this->createFixture([
                    'season_id' => $season->id,
                    'league_id' => $season->league_id,
                    'team_1' => $team->id,
                    'team_2' => $t->id,
                    'home_team_id' => $team->id,
                    'week' => $week,
                    'order' => $order+1,
                    'starts_at' => Carbon::parse($startsAt)->addWeeks($week),
                ]);

                $week++;
            }

            $season->total_week = $week;
            $season->save();
        }

        return true;
    }

    /**
     * @inheritDoc
     */
    public function countOrder(int $team1, int $team2, int $season, int $league): int
    {
        return $this->fixtureRepository->countOrder($team1, $team2, $season, $league);
    }

    /**
     * @inheritDoc
     */
    public function getFixtureByWeek(int $week, int $seasonId)
    {
        return $this->fixtureRepository->getFixtureByWeek($week, $seasonId);
    }
}
