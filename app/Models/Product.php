<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'harga',
        'deskripsi',
        'gambar',
        'detail',
        'kategori',
    ];
}
