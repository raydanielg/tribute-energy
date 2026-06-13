<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'price', 'original_price',
        'color', 'rating', 'reviews', 'specs', 'category',
        'image', 'is_featured', 'is_new', 'is_sale', 'is_active',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_new'      => 'boolean',
        'is_sale'     => 'boolean',
        'is_active'   => 'boolean',
        'price'       => 'float',
        'original_price' => 'float',
    ];
}
