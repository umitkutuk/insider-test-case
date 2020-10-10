<?php

namespace App\Http\Controllers;

use App\Queries\Score\ScoresQuery;
use App\Queries\Season\SeasonsQuery;
use App\Season;
use App\Services\Play\PlayServiceInterface;
use Illuminate\Http\Request;

class PlayController extends Controller
{
    /**
     * @var \App\Services\Play\PlayServiceInterface
     */
    public $playService;

    /**
     * PlayController constructor.
     * @param \App\Services\Play\PlayServiceInterface $playService
     */
    public function __construct(PlayServiceInterface $playService)
    {
        $this->playService = $playService;
    }

    public function index()
    {
        $scores = (new ScoresQuery())->get();

        return view('play.index', compact('scores'));
    }

    public function playOne()
    {
        return $this->playService->playNextWeek();
    }

    public function playAll()
    {
        return 'All';
    }
}
