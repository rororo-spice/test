<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_t', function (Blueprint $table) {
            $table->increments('review_id');
            $table->integer('write_user_id');
            $table->integer('to_user_id');
            $table->integer('project_id');
            $table->tinyInteger('review_point');
            $table->text('review_comment');
            $table->timestamps();
            $table->index(['write_user_id', 'to_user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review_t');
    }
}
