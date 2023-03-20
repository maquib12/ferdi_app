<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    //
    protected $fillable = [
        'title', 'image', 'description', 'tutorial_link', 'applications', '	status'
    ];
    public function user_type()
    {
        return $this->belongsTo(Cmssupportsection::class,'applications');
    }
}
