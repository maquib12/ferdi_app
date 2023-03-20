<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    //
    public function user()
    {
        return $this->hasOne(Userdetail::class);
    }
}
