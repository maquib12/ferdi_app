<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $fillable = ['name','category_id','language_id','price','description','images','videos','created_by','status','reason_for_rejection','total_no_of_module','course_duration_in_hours','learning_objects','course_pdf','time_spent_for_internship','financial_rewards','add_skills','market_overview','remarks'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class,'course_user')->withPivot('mentor_id');
    }
    public function language()
    {
        return $this->belongsTo(Language::class);
    }
    public function mentors()
    {
        return $this->belongsToMany(User::class,'course_mentor','course_id','mentor_id');
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class,'created_by');
    }
    public function user_loans()
    {
        return $this->hasMany(Loan::class);
    }
     public function course_review()
    {
        return $this->belongsTo(Coursereview::class,'id','course_id');
    }
}
