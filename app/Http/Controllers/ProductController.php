<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function total(){
        $products = Product::all();
        return $products->toArray();
    }

    public function index()
    {
        $products = Product::all();
        return view('frontend.Product.index',compact('products'));
        // return $products->toArray();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $inventory = Inventory::all();
        return view('frontend.Product.create', compact('inventory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $products = new Product();
        $products->name = $request->name;
        $products->quantity = $request->quantity;
        $products->manufacture_price = $request->manufacture_price;
        $products->selling_price = $request->selling_price;
        $products->description = $request->description;
        $products->inventory_id = $request->inventory_id;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $newName = time() . "." . $file->getClientOriginalExtension();
            $file->move('images', $newName);
            $products->image = "images/$newName";
        }
        $products->save();
        toast('Your product has been added successfully!','success')->timerProgressBar();
        return redirect()->route('Product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $inventory = Inventory::all();
        $products = Product::find($id);
        return view('frontend.Product.edit', compact('products', 'inventory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $products = Product::find($id);
        $products->name = $request->name;
        $products->quantity = $request->quantity;
        $products->manufacture_price = $request->manufacture_price;
        $products->selling_price = $request->selling_price;
        $products->description = $request->description;
        $products->inventory_id = $request->inventory_id;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $newName = time() . "." . $file->getClientOriginalExtension();
            $file->move('images', $newName);
            $products->image = "images/$newName";
        }
        $products->update();
        toast('Your product has been Updated successfully!','success')->timerProgressBar();
        return redirect()->route('Product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
