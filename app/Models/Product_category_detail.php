<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_category_detail extends Model
{
    use HasFactory;
    public function products(){
        return $this->belongsTo(Product::class);
    }
    public function categories(){
        return $this->belongsTo(Product_category::class);
    }
}
