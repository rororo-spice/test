<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_t', function (Blueprint $table) {
            $table->increments('message_id');
            $table->integer('message_room_id');
            $table->integer('user_id');
            $table->text('message_text');
            $table->dateTime('sending_time');
            $table->timestamps();
            $table->index(['message_room_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message_t');
    }
}
