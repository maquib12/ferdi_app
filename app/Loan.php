<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    //
    protected $fillable = [
        'user_id', 'loan_application', 'reason_for_rejection'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function report()
    {
        return $this->belongsTo(Abusereport::class,'reason_for_rejection');
    }
    public function courses()
    {
        return $this->belongsTo(Course::class,'course_id');
    }
}
