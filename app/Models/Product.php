<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'slug',
        'category_id',
        'store_id',
        'price',
        'image',
        'description'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'product_id', 'id');
    }
}