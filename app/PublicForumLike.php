<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicForumLike extends Model
{
     protected $fillable = [
        'like','user_id','public_forum_id',
    ];
}
