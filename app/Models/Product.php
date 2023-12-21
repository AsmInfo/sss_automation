<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Component;

class Product extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $table = 'product';

    protected $fillable = ['category_id','subcategory_id','title', 'slug','description','price','offer_price','product_attachments','is_published'];
   
    public function component()
    {
         return $this->belongsToMany(Component::class,'product_component')->withTimestamps()->withPivot('format_id');
    }

    public function ProductComponent(): HasMany
    {
        return $this->hasMany(ProductComponent::class);

    }
    // public function format()
    // {
    //     return $this->belongsToMany(Format::class, 'product_format')->withTimestamps();
    // }
    protected $casts = [
        'is_published' => 'boolean',
        'products' => 'array',
        'product_attachments' => 'array',
    ];

    // public function products()
    // {
    //     return $this->hasMany(Product::class);
    // }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function subcategory()
    {

        return $this->belongsTo(Subcategory::class);
    }

}
