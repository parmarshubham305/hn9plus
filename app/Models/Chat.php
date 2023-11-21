<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'chat_type',
        'title',
        'channel',
        'project_id'
    ];

    public function messages() {
        return $this->hasMany('App\Models\ChatMessage');
    }

    public function users() {
        return $this->hasMany('App\Models\ChatUser');
    }
}
