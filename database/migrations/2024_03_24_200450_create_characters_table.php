<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Enums\Character\CharacterSexEnum;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('codename');
            $table->enum('sex', CharacterSexEnum::getConstantsValues());
            $table->string('age');
            $table->longText('avatar')->nullable();
            $table->string('weakness')->nullable();
            $table->string('color')->nullable();
            $table->string('affiliate')->nullable(); // relation
            $table->string('pair')->nullable(); // relation
            $table->string('planet')->nullable(); //relation
            $table->string('city')->nullable(); //relation
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id')
                ->references('id')
                ->on('teams');

            $table->unsignedBigInteger('squad_id')->nullable();
            $table->foreign('squad_id')
                ->references('id')
                ->on('squads');
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
        Schema::dropIfExists('characters');
    }
}
