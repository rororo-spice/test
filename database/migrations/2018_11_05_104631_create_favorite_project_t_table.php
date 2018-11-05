<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoriteProjectTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorite_project_t', function (Blueprint $table) {
            $table->increments('favorite_project_id');
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
        Schema::dropIfExists('favorite_project_t');
    }
}
