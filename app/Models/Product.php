<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Связь с таблицей "Category"
    public function categry(){
        return $this->belongsTo(Categry::class);
    }

}
