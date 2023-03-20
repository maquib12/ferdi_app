<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coursereview extends Model
{
    //
    protected $fillable = [
        'course_id', 'reviewed_by', 'review', 'status'
    ];
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function reviewers()
    {
        return $this->belongsTo(User::class,'reviewed_by');
    }

    public function user_review()
    {
        return $this->belongsTo('App\Courserating','reviewed_by','rating_done_by');
    }
    public function users()
    {
        return $this->belongsTo('App\User','reviewed_by','id');
    }

}
