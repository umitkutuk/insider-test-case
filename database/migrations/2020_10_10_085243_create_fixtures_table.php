<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixtures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('season_id')->constrained('seasons');
            $table->foreignId('league_id')->constrained('leagues');
            $table->foreignId('team_1')->constrained('teams');
            $table->foreignId('team_2')->constrained('teams');
            $table->foreignId('home_team_id')->constrained('teams');
            $table->tinyInteger('week');
            $table->tinyInteger('order')->comment('Aynı Lig ve Sezondaki kacıncı karsılasma oldugu bilgisidir.');
            $table->timestamp('starts_at');
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('fixtures');
    }
}
