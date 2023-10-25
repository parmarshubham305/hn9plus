<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectQuote extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'skills',
        'timeline',
        'description',
        'experience_level',
        'estimated_price',
        'payment_type',
        'quote_type',
        'file',
    ];

    public function setSkillsAttribute($value) {
        $this->attributes['skills'] = json_encode($value);
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function hiredResources() {
        return $this->hasOne('App\Models\ProjectHiredResource', 'project_quotes_id');
    }
}
