<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mentorrequest extends Model
{
    //
    public function mentor_details()
    {
        return $this->belongsTo(User::class,'facilitator_id');
    }
}
