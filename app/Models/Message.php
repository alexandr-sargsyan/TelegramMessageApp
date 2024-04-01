<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table='messages';

    protected $fillable = [
      'tg_chat_id',
      'tg_chat_type',
      'tg_from_user_id',
      'tg_from_first_name',
      'tg_from_username',
      'tg_message_id',
      'is_bot',
      'text',
    ];
}
