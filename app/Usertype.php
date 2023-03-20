<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usertype extends Model
{
    //
    protected $fillable = [
        'user_type',
    ];
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
