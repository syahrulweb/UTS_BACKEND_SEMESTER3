<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petshope extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jenis',
        'status',
    ];
}
