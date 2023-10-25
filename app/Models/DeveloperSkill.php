<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeveloperSkill extends Model
{
    use HasFactory;

    protected $fillable = [
        'developer_id',
        'skill_id',
    ];

}
