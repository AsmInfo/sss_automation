<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\ProductComponent;
use  App\Models\Component;
class AutomationController extends Controller
{
    //
    public function subcategory($slug){

        $category= Category::where('slug', $slug)->first();
        if ($category) {
            $subcategory = Subcategory::where('category_id', $category->id)->get();
        
            foreach ($subcategory as $subcategories) {
               
                // Get the latest product for the current subcategory
                $product = Product::with('category', 'subcategory')
                    ->where('subcategory_id', $subcategories->id)
                    
                    ->get();
                    if ($product) {
                        // Add the product to the array
                        $productArray[] = $product;
                    }
            }
            // dd($productArray[]);
        }
        
        return view('pages.subcategory', compact('subcategory','productArray'));
    }

    public function product_detail($slug){
        
        $product= Product::with('category','subcategory','component.format','ProductComponent')->where('slug', $slug)->first();

        $component = $product->component;
    
                // dd($value);
        return view('pages.detail',compact('product','component'));
    }

    public function sub_product(Request $request)
    {
        try{
        $subcategoryId = $request->input('subcategoryId');
        $subcategory = Subcategory::where('id', $subcategoryId)->get();
        $products= Product::with('category','subcategory')->where('subcategory_id', $subcategoryId)->get();

        $html = view('pages.subcategory', compact('products','subcategory'))->render();

        return response()->json([
            'html' => $html,
        ]);

    } catch (\Exception $e) {
        // Log or handle the exception
        return response()->json([
            'error' => $e->getMessage(),
        ], 500);
    }
    }
}
