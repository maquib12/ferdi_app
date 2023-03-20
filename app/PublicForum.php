<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicForum extends Model
{
    protected $fillable = [
        'heading','title','about','images','facilitator_id'
    ];
}
