<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    //
    protected $fillable = [
        'user_id', 'amount', 'debited_for_course', 'comes_from', 'transaction_type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function purchased_course()
    {
        return $this->hasOne(Course::class,'debited_for_course');
    }
}
