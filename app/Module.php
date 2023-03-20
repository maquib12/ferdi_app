<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    //
    protected $fillable = ['name','course_id','description','images','videos','level','time','no_of_lecture','created_at','updated_at','outcomes','overview','pdf','status'];
}
