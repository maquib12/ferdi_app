<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $fillable = [
        'course_id','module_id','question', 'answer_a','answer_b','answer_c','answer_d','correct_answer','questions_no',
    ];
}
