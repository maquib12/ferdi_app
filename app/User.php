<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_type_id', 'status','email_verified_at','referal_code','facebook_id','google_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function user_type()
    {
        return $this->belongsTo(Usertype::class);
    }
    public function userdetails()
    {
        return $this->hasOne(Userdetail::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function course()
    {
        return $this->belongsToMany(Course::class,'course_users')->withPivot('mentor_id');
    }
    public function mentor_courses()
    {
        return $this->belongsToMany(Course::class,'course_mentor','mentor_id','course_id');
    }
    public function student_mentors()
    {
        return $this->belongsToMany(User::class,'course_user','user_id','mentor_id');
    }
    public function createdCourse()
    {
        return $this->hasMany(Course::class);
    }
    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }
    public function withdrawl_request()
    {
        return $this->hasMany(Withdrawl::class);
    }
    public function abuse_report()
    {
        return $this->hasOne(Abusereport::class,'reason_for_rejection');
    }
    public function loan()
    {
        return $this->hasMany(Loan::class);
    }
    public function mentor_request()
    {
        return $this->hasOne(Mentorrequest::class);
    }
    public function sub_admin_permission()
    {
        return $this->hasMany(Permission::class,'sub_admin');
    }
    public function blog()
    {
        return $this->hasMany(Blog::class);
    }
    public function courses_mentor()
    {
        return $this->hasMany(Course::class,'created_by','id');
    }
   public function courses()
    {
        return $this->belongsTo(Course::class,'id','created_by');
    }
}
  