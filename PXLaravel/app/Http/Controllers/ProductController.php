<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductInventory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Product::all();
        return view('product.index')
            ->with('productData', $patients);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newPatien = new Product;
        $newPatien->name = $request->name;
        $newPatien->description = $request->description;
        $newPatien->sell_price = $request->sell;
        $newPatien->buy_price = $request->buy;
        $newPatien->inventory = $request->stok;
        $newPatien->photo = "";
        $newPatien->is_active = true;
        $newPatien->save();

        $productHistory = new ProductInventory;
        $productHistory->quantity = $request->stok;
        $productHistory->description = "Inisialisasi Stok Produk ".$request->name." dengan Stok ".$request->stok;
        $productHistory->is_active = true;
        $productHistory->type = "add";
        $productHistory->product_id = $newPatien->id;
        $productHistory->save();

        return redirect()->route('product.show', $newPatien->id);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.detail')->with("product", $product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit')
            ->with("product", $product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->name = $request->name;
        $product->description = $request->description;
        $product->sell_price = $request->sell;
        $product->buy_price = $request->buy;
        $product->inventory = $request->stok;
        $product->photo = "";
        $product->is_active = true;
        $product->save();

        $productHistory = new ProductInventory;
        $productHistory->quantity = $request->stok;
        $productHistory->description = "Update Stok Produk ".$request->name." dengan Stok Baru ".$request->stok;
        $productHistory->is_active = true;
        $productHistory->type = "add";
        $productHistory->product_id = $product->id;
        $productHistory->save();

        return redirect()->route('product.show', $product->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->Delete();
        return redirect()->route("product.index");
    }
}
