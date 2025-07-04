<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralInfo extends Model
{
    protected $fillable = [
    'fullname',
    'contact',
    'email',
    'members',
    'paid',
    'reference',
    'reg_date',
    ];
}

