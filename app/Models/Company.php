<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'about_us',
        'address',
        'phone',
        'other_branches',
        'service_ensurance',
        'social_handles',
    ];

    protected $casts = [
        'other_branches' => 'array',
        'service_ensurance' => 'array',
        'social_handles' => 'array',
        'about_us' => 'array',
    ];
}
