<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    public function city()
    {
        return $this->hasMany(City::class);
    }
    public function user()
    {
        return $this->hasMany(Userdetail::class);
    }
}
