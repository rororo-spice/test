<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcceptProjectTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accept_project_t', function (Blueprint $table) {
            $table->increments('accept_project_id');
            $table->integer('user_id');
            $table->integer('project_id');
            $table->timestamps();
            $table->index([ 'user_id','project_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accept_project_t');
    }
}
