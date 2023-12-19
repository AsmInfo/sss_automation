<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\ProductComponent;

class AutomationController extends Controller
{
    //
    public function subcategory($slug){

        $category= Category::where('slug', $slug)->first();
        $subcategory = Subcategory::where('category_id', $category->id)->get();
          
        return view('pages.subcategory', compact('subcategory'));
    }

    public function product_detail($product){
        
        $product= Product::with('category','subcategory')->where('slug', $product)->first();
        $components = $product->components;
        
        
        return view('pages.detail',compact('product','components'));
    }

}
