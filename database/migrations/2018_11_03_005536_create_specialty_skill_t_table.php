<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialtySkillTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialty_skill_t', function (Blueprint $table) {
            $table->increments('specialty_skill_id');
            $table->integer('user_id');
            $table->integer('skill_id');
            $table->timestamps();
            $table->index(['user_id', 'skill_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specialty_skill_t');
    }
}
