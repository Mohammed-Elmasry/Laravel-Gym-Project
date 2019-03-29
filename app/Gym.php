<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    protected $fillable = [
        'name',
        'revenue',
        'created_at',
        'cover_image',
    ];

    protected $dateFormat = 'Y-m-d';
}
