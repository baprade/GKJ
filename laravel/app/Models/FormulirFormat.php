<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormulirFormat extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'onoff',
    ];
}
