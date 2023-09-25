<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;




class PublicController extends Controller
{
    public function home() {
        $products = Product::where('is_accepted', true)->take(6)->orderBy('updated_at','desc')->get();
        
        return view('welcome', compact('products')); 
    }


    public function categoryShow(Category $category) {
        $acceptedProducts = $category->products()->where('is_accepted', true)->get();
        
        return view('categoryShow', compact('category', 'acceptedProducts'));
    }
    


    // public function categoryShow (Category $category){
        
    //     return view ('categoryShow' ,compact('category'));
    // }

    public function searchProducts (Request $request){
    
    $products = Product::search($request->searched)->where('is_accepted', true)->paginate(10);

    return view ('products.index',compact('products'));
    }

    // 

    public function setLanguage($lang)
    {
        session()->put('locale', $lang);
        return redirect()->back();
    }


}

