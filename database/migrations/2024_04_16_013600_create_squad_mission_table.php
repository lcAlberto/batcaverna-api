<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSquadMissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('squad_mission', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('squad_id');
            $table->unsignedBigInteger('mission_id');

            $table->foreign('squad_id')
                ->references('id')
                ->on('squads')
                ->onDelete('cascade');
            $table->foreign('mission_id')
                ->references('id')
                ->on('missions')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('squad_mission');
    }
}
