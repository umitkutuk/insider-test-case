<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin \Eloquent
 */
class Match extends Model
{
    use SoftDeletes;

    /**
     * @inheritDoc
     */
    protected $fillable = [
        'team_1',
        'team_2',
        'season_id',
        'league_id',
        'team_1_goal',
        'team_2_goal',
        'winner_id',
        'starts_at',
    ];

    /**
     * The labels of table columns
     * Generated via php artisan dev:generate:labels Match
     *
     * @var array
     */
    public static $labels = [
        'team_1' => 'Team 1',
        'team_2' => 'Team 2',
        'season_id' => 'Season',
        'league_id' => 'League',
        'team_1_goal' => 'Team 1 Goal',
        'team_2_goal' => 'Team 2 Goal',
        'winner_id' => 'Winner',
        'starts_at' => 'Starts At',
    ];

}
