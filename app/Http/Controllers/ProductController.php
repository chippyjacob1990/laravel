<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Barryvdh\Debugbar\Facades\Debugbar;
use App\Mail\CreatedProductMail;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   //withCount('orders') -> to get count from another relationship user-hasMany-orders
        // withTrashed()->it shows even deleted products(soft-deleted products)
         //Product:withCount('orders')->withTrashed()->find();
        $products = Product::withTrashed()->latest()->paginate(10)->fragment('get-products');
        Debugbar::info("Listed");
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
    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());
        Mail::to("jestin5110@gmail.com")->send(new CreatedProductMail($product));
        return redirect()->route('products.index')
                ->withSuccess('New product is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product) : View
    {
        return view('products.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product) : RedirectResponse
    {
        $product->update($request->all());
        return redirect()->back()
                ->withSuccess('Product is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product) : RedirectResponse
    {
        $product->delete();
        //If the product_id is a primary key, use destroy()
        //Product::destroy($product_id);
        return redirect()->route('products.index')
                ->withSuccess('Product is deleted successfully.');
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function forceDelete($product_id) : RedirectResponse
    {
        Product::find($product_id)->forceDelete();
        return redirect()->route('products.index')
                ->withSuccess('Product is forcefully deleted.');
    }

        
    /**
     * Remove the specified resource from storage.
     */
    public function restore($product_id) : RedirectResponse
    {
        Product::withTrashed()->find($product_id)->restore();
        return redirect()->route('products.index')
        ->with('message', 'Product is restored successfully.');
    }
}