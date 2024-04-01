<?php

// database/migrations/create_messages_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tg_chat_id');
            $table->string('tg_chat_type');
            $table->bigInteger('tg_from_user_id');
            $table->string('tg_from_first_name');
            $table->string('tg_from_username');
            $table->bigInteger('tg_message_id');
            $table->boolean('is_bot');
            $table->text('text');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('messages');
    }
}

