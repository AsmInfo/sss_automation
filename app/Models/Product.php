<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    public function components()
    {
        return $this->belongsToMany(Components::class, 'products_components')->withTimestamps();
    }

    public function formats()
    {
        return $this->belongsToMany(Formats::class, 'products_formats')->withTimestamps();
    }
    protected $casts = [
        'is_published' => 'boolean',
        'products' => 'array',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function subcategory()
    {

        return $this->belongsTo(Subcategory::class);
    }

}
