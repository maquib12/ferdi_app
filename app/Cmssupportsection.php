<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cmssupportsection extends Model
{
    //
   	public function applications()
    {
        return $this->hasOne(Cms::class);
    }
}
