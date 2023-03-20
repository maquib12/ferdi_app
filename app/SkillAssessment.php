<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillAssessment extends Model
{
    protected $fillable = [
        'user_id','course_id','no_of_question','module_id'
    ];
}
