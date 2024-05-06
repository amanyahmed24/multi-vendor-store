<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $guard=[];


    public function user(){
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
    
    public function products(){
        return $this->hasMany(Product::class , 'store_id' , 'id');
    }
}