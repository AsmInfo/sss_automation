<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Components extends Model
{
    use HasFactory;

    protected $table = 'components';

    protected $fillable = ['comp_name'];

    // Define the relationship with products
    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_components', 'components_id', 'product_id', 'formats_id')
            ->withTimestamps();
    }
}
