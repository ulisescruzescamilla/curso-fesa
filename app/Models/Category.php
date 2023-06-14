<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Apunta a la tabla 'categories'
class Category extends Model
{
    use HasFactory, SoftDeletes;

    // indicamos la columnas utilizadas en el INSERT
    protected $fillable = [
        'name'
    ];
}
