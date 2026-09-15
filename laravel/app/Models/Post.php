<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_format',
        'id_category',
        'h1',
        'slug',
        'h2',
        'photo_file',
        'photo_grafer',
        'photo_caption',
        'youtube',
        'belly',
        'key_word',
        'key_slug',
        'views',
        'comments',
        'photos',
        'slide',
        'onoff',
        'created_at',
    ];

    public function format()
    {
        return $this->belongsTo(Format::class, 'id_format', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category', 'id');
    }
}
