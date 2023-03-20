<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    //
    protected $fillable = [
        'language'
    ];
    public function course()
    {
        return $this->hasMany(Course::class);
    }
}
