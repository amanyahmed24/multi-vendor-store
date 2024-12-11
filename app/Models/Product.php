<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    //accessors
    public function getImageUrlAttribute()
    {

        if(!$this->image){
            return 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwbco.sa%2Fproducts&psig=AOvVaw2Es_KlXuhcbTpdUdugqktH&ust=1733394249279000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCOjO_vXyjYoDFQAAAAAdAAAAABAE';
        }

        return Storage::url($this->image);
        
    }

    public function getSalePercentAttribute()
    {

        if(!$this->compare_price){
            return 0;
        }

        return number_format(100 - (100 * $this->price / $this->compare_price),1 );
        
    }
}