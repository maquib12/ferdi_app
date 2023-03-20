<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaveAccount extends Model
{
    protected $fillable = [
        'user_id', 'bank', 'account_no', 'ifsc_code', 'account_holder_name','phone_number','nick_name',"status"
    ];


    public function users()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
