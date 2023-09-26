<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'designation',
        'summary',
        'experience',
        'contact_number',
        'address',
        'email',
        'education',
        'skills'
    ];

    public function setSkillsAttribute($value) {
        $this->attributes['skills'] = implode(',', $value);
    }

    public function getSkillsAttribute($value) {
        return explode(',', $value);
    }

    public function getExperienceAttribute($value) {
        return json_decode($value, true);
    }
    public function getEducationAttribute($value) {
        return json_decode($value, true);
    }
}
