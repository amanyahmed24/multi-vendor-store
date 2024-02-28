<?php

namespace App\Models;
// namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'slug',
        'name',
        'parent_id',
        'image',
        'description'
    ];

    public function products(){
        return $this->hasMany(Product::class , 'category_id' , 'id');
    }

    public function parent(){
        return $this->belongsTo(Category::class , 'category_id' , 'id');
    }


}
