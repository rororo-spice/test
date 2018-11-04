<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillMTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_m', function (Blueprint $table) {
            $table->increments('skill_id');
            $table->string('skill_name');
            $table->tinyInteger('skill_type');
            $table->integer('job_category_id');
            $table->timestamps();
            $table->index(['skill_type', 'job_category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skill_m');
    }
}
