<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'category_name'
    ];
    public function course()
    {
        return $this->hasMany(Course::class);
    }
}
