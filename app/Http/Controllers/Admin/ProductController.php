<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'color' => 'nullable|string',
            'rating' => 'nullable|string|max:10',
            'reviews' => 'nullable|string|max:50',
            'specs' => 'nullable|array',
            'category' => 'nullable|string|max:100',
            'is_featured' => 'boolean',
            'is_new' => 'boolean',
            'is_sale' => 'boolean',
            'original_price' => 'nullable|numeric',
            'image' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        if (isset($validated['specs'])) {
            $validated['specs'] = json_encode($validated['specs']);
        }

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'color' => 'nullable|string',
            'rating' => 'nullable|string|max:10',
            'reviews' => 'nullable|string|max:50',
            'specs' => 'nullable|array',
            'category' => 'nullable|string|max:100',
            'is_featured' => 'boolean',
            'is_new' => 'boolean',
            'is_sale' => 'boolean',
            'original_price' => 'nullable|numeric',
            'image' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        if (isset($validated['specs'])) {
            $validated['specs'] = json_encode($validated['specs']);
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
