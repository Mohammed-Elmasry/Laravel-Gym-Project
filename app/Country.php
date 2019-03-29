<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'capital',
        'citizenship',
        'country_code',
        'currency',
        'currency_code',
        ' currency_sub_unit ',
        'currency_symbol',
        'full_name',
        'name',
    ];
}
