<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index_product() {
        $products = Product::all();

        return inertia('Products/Index', compact('products'));
    }

    public function create_product() {
        return inertia('Products/Create');
    }

    public function store_product(Request $request) {

        $request->validate([
            'name' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $file = $request->file('image');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/' . $path, file_get_contents($file));

        Product::create([
            'name' => $request->name,
            'stock' => $request->stock,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $path
        ]);

        return redirect()->route('index_product')->with("message", "Product created Successfully");
    }

    public function show_product(Product $product) {
        return inertia("Products/Show", compact('product'));
    }

    public function edit_product(Product $product) {
        return inertia("Products/Edit", compact('product'));
    }

    public function update_product(Product $product, Request $request) {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $file = $request->file('image');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/' . $path, file_get_contents($file));

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $path
        ]);

        return inertia('Products/Show', $product);
    }

    public function delete_product(Product $product) {
        $product->delete();
        return redirect()->route('index_product')->with("message", "Product deleted successfully");
    }

}
