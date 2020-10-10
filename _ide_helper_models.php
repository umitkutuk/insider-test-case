<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Fixture
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $season_id
 * @property int $league_id
 * @property int $team_1
 * @property int $team_2
 * @property int $home_team_id
 * @property int $week
 * @property int $order Aynı Lig ve Sezondaki kacıncı karsılasma oldugu bilgisidir.
 * @property string $starts_at
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Team $homeTeam
 * @property-read \App\League $league
 * @property-read \App\Season $season
 * @property-read \App\Team $team1
 * @property-read \App\Team $team2
 * @method static \Illuminate\Database\Eloquent\Builder|Fixture newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Fixture newQuery()
 * @method static \Illuminate\Database\Query\Builder|Fixture onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Fixture query()
 * @method static \Illuminate\Database\Eloquent\Builder|Fixture whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fixture whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fixture whereHomeTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fixture whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fixture whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fixture whereLeagueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fixture whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fixture whereSeasonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fixture whereStartsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fixture whereTeam1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fixture whereTeam2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fixture whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fixture whereWeek($value)
 * @method static \Illuminate\Database\Query\Builder|Fixture withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Fixture withoutTrashed()
 */
	class Fixture extends \Eloquent {}
}

namespace App{
/**
 * App\League
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Team[] $teams
 * @property-read int|null $teams_count
 * @method static \Illuminate\Database\Eloquent\Builder|League newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|League newQuery()
 * @method static \Illuminate\Database\Query\Builder|League onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|League query()
 * @method static \Illuminate\Database\Eloquent\Builder|League whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|League whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|League whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|League whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|League whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|League withTrashed()
 * @method static \Illuminate\Database\Query\Builder|League withoutTrashed()
 */
	class League extends \Eloquent {}
}

namespace App{
/**
 * App\Match
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $team_1
 * @property int $team_2
 * @property int $season_id
 * @property int $league_id
 * @property int $team_1_goal
 * @property int $team_2_goal
 * @property int $winner_id
 * @property string $starts_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Match newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Match newQuery()
 * @method static \Illuminate\Database\Query\Builder|Match onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Match query()
 * @method static \Illuminate\Database\Eloquent\Builder|Match whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Match whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Match whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Match whereLeagueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Match whereSeasonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Match whereStartsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Match whereTeam1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Match whereTeam1Goal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Match whereTeam2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Match whereTeam2Goal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Match whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Match whereWinnerId($value)
 * @method static \Illuminate\Database\Query\Builder|Match withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Match withoutTrashed()
 */
	class Match extends \Eloquent {}
}

namespace App{
/**
 * App\Score
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $season_id
 * @property int $league_id
 * @property int $team_id
 * @property int|null $score
 * @property int|null $total_positive_goal
 * @property int|null $total_negative_goal
 * @property int|null $goal_average
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\League $league
 * @property-read \App\Season $season
 * @property-read \App\Team $team
 * @method static \Illuminate\Database\Eloquent\Builder|Score newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Score newQuery()
 * @method static \Illuminate\Database\Query\Builder|Score onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Score query()
 * @method static \Illuminate\Database\Eloquent\Builder|Score whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Score whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Score whereGoalAverage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Score whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Score whereLeagueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Score whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Score whereSeasonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Score whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Score whereTotalNegativeGoal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Score whereTotalPositiveGoal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Score whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Score withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Score withoutTrashed()
 */
	class Score extends \Eloquent {}
}

namespace App{
/**
 * App\Season
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $starts_at
 * @property string $ends_at
 * @property string $season
 * @property int $is_active
 * @property int $is_done
 * @property int $league_id
 * @property int $total_week
 * @property int $week
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\League $league
 * @method static \Illuminate\Database\Eloquent\Builder|Season newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Season newQuery()
 * @method static \Illuminate\Database\Query\Builder|Season onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Season query()
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereIsDone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereLeagueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereSeason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereStartsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereTotalWeek($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereWeek($value)
 * @method static \Illuminate\Database\Query\Builder|Season withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Season withoutTrashed()
 */
	class Season extends \Eloquent {}
}

namespace App{
/**
 * App\Team
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property int|null $score
 * @property int|null $total_score
 * @property int $match_count
 * @property int|null $total_positive_goal
 * @property int|null $total_negative_goal
 * @property int|null $goal_average
 * @property int $league_id
 * @property int $power
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\League $league
 * @method static \Illuminate\Database\Eloquent\Builder|Team newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team newQuery()
 * @method static \Illuminate\Database\Query\Builder|Team onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Team query()
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereGoalAverage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereLeagueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereMatchCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team wherePower($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereTotalNegativeGoal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereTotalPositiveGoal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereTotalScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Team withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Team withoutTrashed()
 */
	class Team extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

