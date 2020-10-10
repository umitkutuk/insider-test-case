<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin \Eloquent
 */
class Team extends Model
{
    use SoftDeletes;

    /**
     * @inheritDoc
     */
    protected $fillable = [
        'name',
        'score',
        'total_score',
        'match_count',
        'total_positive_goal',
        'total_negative_goal',
        'goal_average',
        'league_id',
        'power'
    ];

    /**
     * The labels of table columns
     * Generated via php artisan dev:generate:labels Team
     *
     * @var array
     */
    public static $labels = [
        'name' => 'Name',
        'score' => 'Score',
        'total_score' => 'Total Score',
        'match_count' => 'Match Count',
        'total_positive_goal' => 'Total Positive Goal',
        'total_negative_goal' => 'Total Negative Goal',
        'goal_average' => 'Goal Average',
        'league_id' => 'League',
        'power' => 'Power'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function league(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(League::class);
    }

}
