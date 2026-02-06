<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrueCreator extends Model
{
    protected $fillble = [
        'name',
        'phone',
        'url',
        'socials',
    ];

    protected $casts = [
        'socials' => 'array',
    ];
}
