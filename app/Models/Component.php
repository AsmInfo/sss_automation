<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Format;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Component extends Model
{
    use HasFactory;

    protected $table = 'component';

    protected $fillable = ['comp_name'];

    // Define the relationship with products
    public function product()
    {
        return $this->belongsToMany(Product::class,'product_component', 'component_id', 'product_id')->withPivot('format_id');
    }
    public function format() {
        return $this->belongsToMany(Format::class, 'product_component', 'component_id', 'format_id')->withPivot('product_id');
    }
}
