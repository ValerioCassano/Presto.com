<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function indexProduct()
    {
        $products = Product::where('is_accepted', true)->paginate(10);
        return view('products.index',compact('products'));
    }
    
    /**
    * Show the form for creating a new resource.
    */
    public function create()
    {
        return view('products.create');
    }
    
    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        //
    }
    
    /**
    * Display the specified resource.
    */
    // public function showProduct(Product $product)
    // {
        //     return view ('products.show', compact('product'));
        // }
        
        public function showProduct(Product $product, Product $relatedProduct = null)
        {
            $category = $product->category;
        
            // Ottieni gli ID dei prodotti correlati con la stessa categoria del prodotto mostrato
            $relatedProductIds = Product::where('category_id', $category->id)
                ->where('id', '<>', $product->id)
                ->where('id', '<>', optional($relatedProduct)->id)
                ->where('is_accepted', true)
                ->pluck('id')
                ->toArray();
        
            // Mescola gli ID casualmente
            shuffle($relatedProductIds);
        
            // Prendi massimo 4 prodotti dalla lista mescolata
            $randomRelatedProductIds = array_slice($relatedProductIds, 0, 4);
        
            // Ottieni i dettagli dei prodotti correlati casuali
            $relatedProducts = Product::whereIn('id', $randomRelatedProductIds)
                ->get();
        
            $productToShow = $relatedProduct ?: $product;
        
            return view('products.show', compact('productToShow', 'relatedProduct', 'relatedProducts'));
        }
        
        
        /**
        * Show the form for editing the specified resource.
        */
        public function edit(Product $product)
        {
            //
        }
        
        /**
        * Update the specified resource in storage.
        */
        public function update(Request $request, Product $product)
        {
            //
        }
        
        /**
        * Remove the specified resource from storage.
        */
        public function destroy(Product $product)
        {
            //
        }
    }
    