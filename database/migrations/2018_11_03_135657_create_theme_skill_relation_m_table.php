<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemeSkillRelationMTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theme_skill_relation_m', function (Blueprint $table) {
            $table->increments('theme_skill_relation_id');
            $table->integer('theme_id');
            $table->integer('skill_id');
            $table->timestamps();
            $table->index(['theme_id', 'skill_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('theme_skill_relation_m');
    }
}
