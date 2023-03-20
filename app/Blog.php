<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $fillable = [
        'title', 'image_one', 'image_second', 'image_third', 'image_fourth', 'video_link', 'content', 'contributor', 'created_by'
    ];
    public function owner()
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
