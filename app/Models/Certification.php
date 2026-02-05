<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $table = 'certifications';
    
    protected $fillable = [
        'title',
        'issuing_organisation',
        'category',
        'issued',
        'expires',
        'description',
        'logo',
    ];
}