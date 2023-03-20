<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    protected $fillable = [
        'page_id', 'sub_admin','add','edit','delete'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
