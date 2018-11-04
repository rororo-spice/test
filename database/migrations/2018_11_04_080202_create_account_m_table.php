<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountMTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_m', function (Blueprint $table) {
            $table->increments('account_id');
            $table->integer('user_id');
            $table->string('bank_name');
            $table->tinyInteger('account_type');
            $table->string('office_name');
            $table->integer('account_number');
            $table->string('account_name');
            $table->timestamps();
            $table->index(['user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_m');
    }
}
