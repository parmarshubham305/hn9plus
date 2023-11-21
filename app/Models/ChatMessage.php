<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime'
    ];

    protected $fillable = [
        'chat_id',
        'user_id',
        'message',
        'message_type',
        'send_by',
        'is_seen'
    ];
}
