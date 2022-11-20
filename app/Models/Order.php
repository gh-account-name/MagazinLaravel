<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'status'];

    // Связь 1/м с таблицей "Cart"
    public function cart(){
        return $this->hasMany(Cart::class);
    }

    // Связь м/1 с таблицей "User"
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Связь м/м с таблицей "Products" через таблицу "Cart"
    public function product(){
        return $this->hasManyThrough(Product::class, Cart::class);
    }

}
