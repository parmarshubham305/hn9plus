<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'user_id',
        'channel',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
