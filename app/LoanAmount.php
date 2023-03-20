<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanAmount extends Model
{
    protected $fillable = [
        'user_id', 'amount', 'course_id','message','status'
    ];
}
