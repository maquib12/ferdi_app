<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sponsoredCourse extends Model
{
    protected $table = 'sponsored_courses';
    protected $fillable = [
        'user_id','course_id','status','sponsor_id'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id')->with('createdBy','course_review');
    }
    public function sponsor(){
         return $this->belongsTo(User::class,'sponsor_id','id');
    }
     public function userdetails()
    {
        return $this->belongsTo(Userdetail::class,'sponsor_id','user_id');
    }

    public function students()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function students_details()
    {
        return $this->belongsTo(Userdetail::class,'user_id','user_id');
    }
     public function course_progress()
    {
        return $this->belongsTo(courseUser::class,'course_id','course_id');
    }
}
