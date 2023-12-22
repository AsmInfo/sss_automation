<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductComponent extends Pivot
{
    use HasFactory;
    protected $table = 'product_component';     
    
}
