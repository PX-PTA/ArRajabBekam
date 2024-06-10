<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Models\SaleDetail;
use App\Models\ProductInventory;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Sale::all();
        return view('sales.index')
            ->with('productData', $patients)
            ->with('totalSalePrice',$patients->sum('total_price'))
            ->with('totalSaleQuantity',$patients->sum('total_quantiy'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('sales.create')
        ->with('products', $products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $total_quantity = 0;
        $total_price = 0;
        for ($x = 0; $x < sizeof($request->products); $x++) 
        { 
            $productData = Product::Find($request->products[$x]);
            $total_price += $productData->sell_price*$request->qtys[$x];
            $total_quantity += $request->qtys[$x];
        }


        

        $newSales = new Sale;
        $newSales->total_quantiy = $total_quantity;
        $newSales->total_price = $total_price;
        $newSales->description = "Penjualan Tgl ".Carbon::now()->toDateTimeString();
        $newSales->save();
        
        for ($x = 0; $x < sizeof($request->products); $x++) 
        { 
            $productData = Product::Find($request->products[$x]);
            $newSalesDetail = new SaleDetail;
            $newSalesDetail->sell_price = $productData->sell_price;
            $newSalesDetail->buy_price = $productData->buy_price;
            $newSalesDetail->quantity = $request->qtys[$x];
            $newSalesDetail->product_id = $request->products[$x];
            $newSalesDetail->sale_id = $newSales->id;
            $newSalesDetail->save();

            $productHistory = new ProductInventory;
            $productHistory->quantity = $request->qtys[$x];
            $productHistory->description = "Penjualan Produk ".$request->name." dengan jumlah ".$request->qtys[$x];
            $productHistory->is_active = true;
            $productHistory->type = "subtract";
            $productHistory->product_id = $request->products[$x];
            $productHistory->sale_detail_id = $newSalesDetail->id;
            $productHistory->save();

            $productData->inventory = $productData->inventory - $request->qtys[$x];
            $productData->save();
        }

        return redirect()->route('sale.show', $newSales->id);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        return view('sales.detail')->with("sale", $sale);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
