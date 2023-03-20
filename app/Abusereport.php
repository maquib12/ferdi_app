<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abusereport extends Model
{
    //
    protected $fillable = [
        'reports'
    ];
    public function loan()
    {
        return $this->hasMany(Loan::class);
    }
}
