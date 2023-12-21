<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
    use HasFactory;
    protected $table = 'format';

    protected $fillable = ['type'];
    // Define the relationship with products
    // public function products()
    // {
    //     return $this->belongsToMany(Product::class,'product_component')->withTimestamps();
    // }
}
