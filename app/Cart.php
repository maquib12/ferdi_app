<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function course()
    {
        return $this->belongsTo(Course::class,'course_id')->with('createdBy');
    }
}
