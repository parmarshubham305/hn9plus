<?php

namespace App\Helpers;
use DB;
use App\Models\Skill;
use App\Models\DeveloperSkill;

class Helper
{
    public static function getEnumValues($table, $column) {
        $type = DB::select(DB::raw("SHOW COLUMNS FROM $table WHERE Field = '{$column}'"))[0]->Type ;
        
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $enum = array();
        foreach( explode(',', $matches[1]) as $value )
        {
          $v = trim( $value, "'" );
          $enum[$v] = $v;
        }
        return $enum;
    }

    public static function getDeveloperSkills($id) {
        $skillIds = DeveloperSkill::where('developer_id', $id)->pluck('skill_id', 'skill_id')->toArray();
        $skills = Skill::whereIn('id', $skillIds)->pluck('title', 'title')->toArray();
        return implode(', ', $skills);
    }
}