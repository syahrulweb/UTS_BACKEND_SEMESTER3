<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class digitalmedia extends Model
{
    
    protected $table = 'digitalmedia';

    protected $fillable = [
        'title',
        'author',
        'description',
        'content',
        'url',
        'url_image',
        'published_at',
        'category'
    ];
}