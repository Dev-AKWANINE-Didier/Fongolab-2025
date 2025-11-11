<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index',['products'=>$products]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create',['categories'=>$categories]);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required','string','min:2','max:100','unique:products,name'],
            'category'=>['required','exists:categories,id'],
            'description'=>[''],
        ]);

        Product::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'category_id'=>$request->category,
            'description'=>$request->description,
        ]);
        return redirect()->route("dashboard-products-index");
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit',['categories'=>$categories,'product'=>$product]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'=>['required','string','min:2','max:100',Rule::unique('products')->ignore($product->id)],
            'category'=>['required','exists:categories,id'],
            'description'=>[''],
        ]);
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->category_id = $request->category;
        $product->description = $request->description;
        
        # 
        $product->save();
        return redirect()->route("dashboard-products-index");
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('dashboard-products-index');
        //
    }
}