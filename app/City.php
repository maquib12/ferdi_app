<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $fillable = [
        'name', 'country_id'
    ];
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function user()
    {
        return $this->hasMany(UserDetail::class);
    }
}
