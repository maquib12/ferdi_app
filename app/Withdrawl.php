<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdrawl extends Model
{
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $table = 'withdrawls';
    protected $fillable = [
        'user_id','withdrawl_amount','status',
    ];
}
