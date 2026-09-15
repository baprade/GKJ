<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'id_post',
        'photo_file',
        'created_at',
    ];
}
