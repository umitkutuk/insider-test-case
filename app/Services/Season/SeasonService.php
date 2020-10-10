<?php

namespace App\Services\Season;

use App\Repositories\Season\SeasonRepositoryInterface;
use App\Season;
use App\Services\Fixture\FixtureServiceInterface;

class SeasonService implements SeasonServiceInterface
{
    /**
     * @var \App\Repositories\Season\SeasonRepositoryInterface
     */
    public $seasonRepository;
    /**
     * @var \App\Services\Fixture\FixtureServiceInterface
     */
    public $fixtureService;

    /**
     * @param \App\Repositories\Season\SeasonRepositoryInterface $seasonRepository
     */
    public function __construct(
        SeasonRepositoryInterface $seasonRepository
    )
    {
        $this->seasonRepository = $seasonRepository;
        $this->fixtureService  = resolve(FixtureServiceInterface::class);
    }

    /**
     * @inheritDoc
     */
    public function createSeason(array $data): Season
    {
        $season = $this->seasonRepository->create($data);

        return $season;
    }

    /**
     * @inheritDoc
     */
    public function getSeasonById(int $id): Season
    {
        return $this->seasonRepository->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function updateSeason(array $data, int $id): Season
    {
        $season = $this->seasonRepository->update($data, $id);

        return $season;
    }

    /**
     * @inheritDoc
     */
    public function destroySeason(int $id): Season
    {
        $season = $this->seasonRepository->destroy($id);

        return $season;
    }

    /**
     * @inheritDoc
     */
    public function setActive(int $id): bool
    {
        $check = $this->seasonRepository->checkActive($id);

        if (!$check) {
            $season = $this->seasonRepository->update(['is_active' => true], $id);

            $this->fixtureService->generateFixture($season);

            return true;
        }

        return false;
    }

    /**
     * @inheritDoc
     */
    public function getNotFinished()
    {
        return $this->seasonRepository->getNotFinished();
    }
}
