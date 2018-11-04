<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlockCompanyTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('block_company_t', function (Blueprint $table) {
            $table->increments('block_company_id');
            $table->integer('user_id');
            $table->integer('block_user_id');
            $table->timestamps();
            $table->index(['user_id', 'block_user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('block_company_t');
    }
}
