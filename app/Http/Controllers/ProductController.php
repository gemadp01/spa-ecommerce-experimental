<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
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

    public function store_product(StoreProductRequest $request) {

        $validatedData = $request->validated();

        $file = $request->file('image');
        $fileNameWithoutSpacing = str_replace(' ', '', $request->name);
        $validatedData['image'] = time() . '_' . $fileNameWithoutSpacing . '.' . $file->getClientOriginalExtension();
        Storage::disk('local')->put('public/products/' . $validatedData['image'], file_get_contents($file));

        Product::create($validatedData);

        return redirect()->route('index_product')->with("message", "Product created Successfully");
    }

    public function show_product(Product $product) {
        return inertia("Products/Show", compact('product'));
    }

    public function edit_product(Product $product) {
        return inertia("Products/Edit", compact('product'));
    }

    public function update_product(Product $product, Request $request) {
        $validatedData = $request->validated();

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::disk('local')->delete('public/products/' . $product->image);
            }

            $file = $request->file('image');
            $fileNameWithoutSpacing = str_replace(' ', '', $request->name);
            $validatedData['image'] = time() . '_' . $fileNameWithoutSpacing . '.' . $file->getClientOriginalExtension();
            Storage::disk('local')->put('public/products/' . $validatedData['image'], file_get_contents($file));
        }

        $product->update($validatedData);

        return inertia('Products/Show', $product);
    }

    public function delete_product(Product $product) {
        if($product->image) {
            Storage::disk('local')->delete('public/products/' . $product->image);
        }
        $product->delete();
        return redirect()->route('index_product')->with("message", "Product deleted successfully");
    }

}
