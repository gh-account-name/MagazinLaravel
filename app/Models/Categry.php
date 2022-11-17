<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categry extends Model
{
    use HasFactory;

    // Связь с таблицей "products"
    public function products(){
        return $this->hasMany(Product::class);
    }
    
}
