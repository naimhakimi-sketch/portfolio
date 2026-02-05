<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'name',
        'content',
        'profile_image',
        'resume',
        'linkedin',
        'github',
        'email',
        'phone',
    ];
}