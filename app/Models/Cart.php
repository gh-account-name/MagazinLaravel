<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'product_id'];

    // Связь м/1 с таблицей "Order"
    public function order(){
        return $this->belongsTo(Order::class);
    }

    // Связь м/1 с таблицей "Product"
    public function product(){
        return $this->belongsTo(Product::class);
    }

}
