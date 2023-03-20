<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fan extends Model
{
    protected $fillable = [
        'student_id','facilitator_id','status'
    ];

    public function users()
    {
        return $this->belongsTo('App\User','student_id','id');
    }
    public function user_details()
    {
        return $this->belongsTo('App\Userdetail','student_id','user_id');
    }
}
