<?php

namespace App\Models;
// namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id' , 
        'first_name' , 
        'last_name' , 
        'birthday' ,
        'city', 
        'country', 
    ];
    public function user(){
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
}
