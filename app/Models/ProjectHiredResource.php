<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectHiredResource extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_quotes_id',
        'resources'
    ];
}