<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chat_id');
            $table->longText('message');
            $table->enum('message_type', ['Text', 'Media'])->default('Text');
            $table->enum('send_by', ['Admin', 'User'])->default('User');
            $table->enum('is_seen', ['0', '1'])->default('0');
            $table->foreign('chat_id')
            ->references('id')->on('chats')
            ->onDelete('cascade');
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
        Schema::dropIfExists('chat_messages');
    }
}
