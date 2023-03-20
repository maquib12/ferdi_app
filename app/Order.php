<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function course()
    {
        return $this->belongsTo(Course::class,'course_id','id');
    }
    public function student()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
