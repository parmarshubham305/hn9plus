<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'parent_id',
        'title',
        'logo',
        'price',
        'description',
        'status',
    ];
}
