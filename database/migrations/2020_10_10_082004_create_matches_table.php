<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_1')->constrained('teams');
            $table->foreignId('team_2')->constrained('teams');
            $table->foreignId('season_id')->constrained('seasons');
            $table->foreignId('league_id')->constrained('leagues');
            $table->integer('team_1_goal');
            $table->integer('team_2_goal');
            $table->foreignId('winner_id')->constrained('teams');
            $table->timestamp('starts_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
