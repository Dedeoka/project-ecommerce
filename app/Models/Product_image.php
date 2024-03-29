<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_image extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function products(){
        return $this->belongsTo(Product::class);
    }
}
