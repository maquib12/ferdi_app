<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumLike extends Model
{
    protected $fillable = [
        'like','user_id','forum_id',
    ];
}
