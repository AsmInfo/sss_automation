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
        
            // foreach ($subcategory as $subcategories) {
               
            //     // Get the latest product for the current subcategory
            //     $product = Product::with('category', 'subcategory')
            //         ->where('subcategory_id', $subcategories->id)
                    
            //         ->get();
            //         if ($product) {
            //             // Add the product to the array
            //             $productArray[] = $product;
            //         }
            // }
            // dd($productArray[]);
        }
        
        return view('pages.subcategory', compact('subcategory','subcategory'));
    }

    public function products($name){
        $productlist= Product::with('category','subcategory','component.format','ProductComponent')
        ->whereHas('subcategory', function ($query) use ($name) {
            $query->where('name', $name);
        })->where('is_published', true)->latest()->get();
        
        return view('pages.productlist',compact('productlist'));
    }

    public function product_detail($slug){
        
        $product= Product::with('category','subcategory','component.format','ProductComponent')->where('is_published', true)
        ->where('slug', $slug)->firstOrFail();
        $component = $product->component;
        $relatedProducts = Product::with('subcategory')->where('subcategory_id',$product->subcategory->id)->where('id', '!=', $product->id)->get();
        // dd($relatedProducts);
        if ($relatedProducts->isEmpty()) {
            $relatedProducts = Product::with('subcategory')->where('id', '!=', $product->id)->get();
        }
        
        
                
        return view('pages.detail',compact('product','component','relatedProducts'));
    }

    public function cart()
    {
        return view('pages.cart');
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        
        $media = $product->getMedia('product');
        $imageUrl = $media->isNotEmpty() ? $media->first()->getUrl() : null;
        
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->title,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $imageUrl
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        try { 
        if($request->id && $request->quantity){
            
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
        
        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        // Log the error
        \Log::error('Error updating cart: ' . $e->getMessage());

        return response()->json(['error' => 'Internal Server Error'], 500);
    }

    }
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
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
