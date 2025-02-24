<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['customer_full_name', 'created_at', 'status', 'customer_comment', 'count', 'product_id'];  

    public function product()  
    {  
        return $this->belongsTo(Product::class);  
    }  
}
