<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectMTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_m', function (Blueprint $table) {
            $table->increments('project_id');
            $table->string('project_name');
            $table->text('project_detail_text');
            $table->integer('recruitment_people');
            $table->text('requir_languege');
            $table->text('requir_tool');
            $table->text('requir_experience');
            $table->integer('honorarium');
            $table->tinyInteger('advance_payment_flg');
            $table->tinyInteger('promane_flg');
            $table->tinyInteger('status');
            $table->dateTime('application_period');
            $table->dateTime('deadline');
            $table->timestamps();
            $table->index([ 'status']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_m');
    }
}
