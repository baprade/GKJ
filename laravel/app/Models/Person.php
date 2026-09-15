<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'sidi',
        'nikah_by',
        'nikah_date',
        'passed_date',
        'parrent',
        'spouse',
        'nia',
        'from',
        'to',
        'note',
    ];
}
