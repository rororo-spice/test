<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserMTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_m', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('company_name');
            $table->string('position');
            $table->date('birthday');
            $table->tinyInteger('sex');
            $table->tinyInteger('leader_experience');
            $table->string('icon_image');
            $table->string('final_education');
            $table->text('profile');
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
        Schema::dropIfExists('user_m');
    }
}
