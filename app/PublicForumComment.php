<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicForumComment extends Model
{
    protected $fillable = [
        'comments','user_id','public_forum_id',
    ];
}
