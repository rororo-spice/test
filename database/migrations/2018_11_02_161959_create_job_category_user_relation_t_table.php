<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobCategoryUserRelationTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_category_user_relation_t', function (Blueprint $table) {
            $table->increments('job_category_user_relation_id');
            $table->integer('user_id');
            $table->integer('job_category_id');
            $table->timestamps();
            $table->index(['user_id', 'job_category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_category_user_relation_t');
    }
}
