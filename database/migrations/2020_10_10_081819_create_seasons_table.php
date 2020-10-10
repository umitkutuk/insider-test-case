<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seasons', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamp('starts_at');
            $table->timestamp('ends_at');
            $table->string('season');
            $table->boolean('is_active')->default(false);
            $table->boolean('is_done')->default(false);
            $table->foreignId('league_id')->constrained('leagues');
            $table->tinyInteger('total_week')->default(0);
            $table->tinyInteger('week')->default(0);
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
        Schema::dropIfExists('seasons');
    }
}
