<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded;
    
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function orders()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }
}
