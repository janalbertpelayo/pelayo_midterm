<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', ['products' => $products]);
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'description' => 'nullable',
        ]);

        $newProduct = Product::create($data);

        return redirect()->route('product.index');
        
    }

    public function edit(Product $product)
    {
        return view('product.edit', ['product' => $product]); 
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'description' => 'nullable',
        ]);

        $product->update($data);
        return response()->json(['message' => 'Product updated successfully', 'product' => $product], 200);
    }

// Remove the specified product from storage 
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect(route('product.index'))->with('success', 'Product deleted successfully');
    }
}
