<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formats extends Model
{
    use HasFactory;
    protected $table = 'formats';

    protected $fillable = ['type'];
    // Define the relationship with products
    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_formats')->withTimestamps();
    }
}
