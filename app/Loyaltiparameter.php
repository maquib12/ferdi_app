<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loyaltiparameter extends Model
{
    //
    protected $fillable = [
        'referral', 'joining', 'dollar',
    ];
}
