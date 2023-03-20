<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class favouriteCourse extends Model
{
    protected $table = 'favourite_courses';
    protected $fillable = [
        'user_id','course_id','favourite_status'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id')->with('createdBy','course_review');
    }
//     public function course_review()
//     {
//         return $this->belongsTo(Coursereview::class,'course_id');
//     }
}
