<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Product extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $table = 'products';

    protected $fillable = ['category_id','subcategory_id','title', 'slug','description','price','offer_price','product_attachments','is_published'];
   


    public function components()
    {
        return $this->belongsToMany(Components::class, 'products_components','product_id','components_id','formats_id')->withTimestamps();
    }

    public function ProductComponent(): HasMany
    {
        return $this->hasMany(ProductComponent::class);

    }
    // public function formats()
    // {
    //     return $this->belongsToMany(Formats::class, 'products_formats')->withTimestamps();
    // }
    protected $casts = [
        'is_published' => 'boolean',
        'products' => 'array',
        'product_attachments' => 'array',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function subcategory()
    {

        return $this->belongsTo(Subcategory::class);
    }

}
