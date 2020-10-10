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
        $teamIds = $teams->pluck('id')->toArray();

        $teamCount = count($teamIds);
        $matchCount = $teamCount / 2;
        $totalWeek = ($teamCount - 1) * 2;

        for ($i = 1; $i<= $totalWeek; $i++){

            $k = 0;
            while($k !== $matchCount){
                $rand = array_rand($teamIds, 2);

                [$team1, $team2] = [$teamIds[$rand[0]], $teamIds[$rand[1]]];

                if (!$this->fixtureExists($team1, $team2, $i, $season->id, $season->league_id)){
                    $order = $this->countOrder($team1, $team2, $season->id, $season->league_id);

                    $homeTeam = $this->getFixtureForHomeTeam($team1, $team2, $season->id, $season->league_id);

                    $homeTeamId =  is_null($homeTeam)
                        ? $team1
                        : ($homeTeam->id === $team1 ? $team2 : $team1);

                    $this->createFixture([
                        'season_id' => $season->id,
                        'league_id' => $season->league_id,
                        'team_1' => $team1,
                        'team_2' => $team2,
                        'home_team_id' => $homeTeamId,
                        'week' => $i,
                        'order' => $order+1,
                        'starts_at' => Carbon::parse($startsAt)->addWeeks($i),
                    ]);

                    ++$k;
                }
            }

        }

        foreach ($teams as $team) {
            $this->scoreService->createScore([
                'season_id' => $season->id,
                'league_id' => $season->league_id,
                'team_id' => $team->id,
                'score' => 0
            ]);
        }

        $season->total_week = $totalWeek;
        $season->save();

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

    /**
     * @inheritdoc
     */
    public function fixtureExists(int $team1, int $team2, int $week, int $seasonId, int $leagueId): bool
    {
        return $this->fixtureRepository->fixtureExists($team1, $team2, $week, $seasonId, $leagueId);
    }

    /**
     * @inheritdoc
     */
    public function getFixtureForHomeTeam(int $team1, int $team2, int $seasonId, int $leagueId)
    {
        return $this->fixtureRepository->getFixtureForHomeTeam($team1, $team2, $seasonId, $leagueId);
    }
}
