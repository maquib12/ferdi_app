<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class courseUser extends Model
{
    protected $table = 'course_users';
    protected $fillable = [
        'user_id','course_id','mentor_id','progress','status'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id')->with('createdBy','course_review');
    }
    public function student_course()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function student_details()
    {
        return $this->belongsTo(Userdetail::class,'user_id','user_id');
    }
}
