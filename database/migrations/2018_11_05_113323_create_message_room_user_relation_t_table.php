<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageRoomUserRelationTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_room_user_relation_t', function (Blueprint $table) {
            $table->increments('message_room_user_relation_id');
            $table->integer('message_room_id');
            $table->integer('user_id');
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
        Schema::dropIfExists('message_room_user_relation_t');
    }
}
