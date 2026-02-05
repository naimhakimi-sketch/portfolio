<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'short_description',
        'full_description',
        'image',
        'live_url',
        'github_url',
        'tech_stack',
        'project_type',
        'start_date',
        'end_date',
        'status',
    ];

    protected $casts = [
        'tech_stack' => 'array',
    ];
}