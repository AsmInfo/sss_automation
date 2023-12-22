<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Subcategory extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $fillable = ['category_id', 'name', 'slug'];
    public function category()
    {

        return $this->belongsTo(Category::class);
    }
}
