<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->integer('score')->nullable();
            $table->integer('total_score')->nullable();
            $table->integer('match_count')->default(0);
            $table->integer('total_positive_goal')->nullable();
            $table->integer('total_negative_goal')->nullable();
            $table->integer('goal_average')->nullable();
            $table->foreignId('league_id')->constrained('leagues');
            $table->tinyInteger('power');
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
        Schema::dropIfExists('teams');
    }
}
