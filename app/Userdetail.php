<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userdetail extends Model
{
    //
    protected $fillable = [
        'user_id', 'address', 'phone_no', 'country_id', 'city_id', 'image', 'gender' , 'date_of_birth', 'phone_code','sponsor_code','business_industry','id_proof','business_name','business_owner_name','business_logo','license'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function business_industry_relation()
    {
        return $this->belongsTo(Business::class,'business_industry');
    }
}
