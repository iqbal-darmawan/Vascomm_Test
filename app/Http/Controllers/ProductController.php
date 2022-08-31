<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        // dd($products);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:3',
            'image' => 'required|image|mimes:jpeg,jpg,png,svg',
        ]);

        $attr = $request->all();

        $thumbnail = request()->file('image') ? request()->file('image')->store("images/products") : null ;
        $attr['image'] = $thumbnail;

        Product::create($attr);

        session()->flash('success', 'The post has been created');

        return redirect('admin/product');
    }

    public function edit(Product $product)
    {
        return view('admin.product.edit',[
            'product' => $product
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:3',
            'image' => 'image|mimes:jpeg,jpg,png,svg',
        ]);

        if (request()->file('image')) {
            \Storage::delete($product->image);
            $image = request()->file('image')->store("images/products");
        }
        else {
            $image = $product->image;
        }

        $attr = $request->all();
        $attr['image'] = $image;

        $product->update($attr);

        return redirect('admin/product');
    }

    public function destroy(Product $product)
    {
        \Storage::delete($product->thumbnail);
        $product->delete();

        return back();
    }
}

