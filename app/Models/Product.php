<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'category_id', 'description', 'price'];  

    public function category()  
    {  
        return $this->belongsTo(Category::class);  
    }  

    public function order()  
    {  
        return $this->hasOne(Order::class);  
    }  
}
