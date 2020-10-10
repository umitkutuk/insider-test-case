<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin \Eloquent
 */
class Season extends Model
{
    use SoftDeletes;

    /**
     * @inheritDoc
     */
    protected $fillable = [
        'name',
        'starts_at',
        'ends_at',
        'season',
        'is_active',
        'league_id',
        'is_done',
        'total_week',
        'week'
    ];

    /**
     * The labels of table columns
     * Generated via php artisan dev:generate:labels Season
     *
     * @var array
     */
    public static $labels = [
        'name' => 'Name',
        'starts_at' => 'Starts_at',
        'ends_at' => 'Ends_at',
        'season' => 'Season',
        'is_active' => 'Active',
        'league_id' => 'League',
        'is_done' => 'Done',
        'total_week' => 'Total Week',
        'week' => 'Week'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function league(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(League::class);
    }

}
