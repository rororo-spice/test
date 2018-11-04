<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follow_t', function (Blueprint $table) {
            $table->increments('follow_id');
            $table->integer('user_id');
            $table->integer('follow_user_id');
            $table->timestamps();
            $table->index(['user_id', 'follow_user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follow_t');
    }
}
