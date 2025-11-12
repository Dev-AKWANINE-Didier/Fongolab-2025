<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view("admin.articles.index",['articles'=>$articles]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view("admin.articles.create",['products'=>$products]);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required',"string","min:2","max:100",'unique:articles,name'],
            'price'=>['required',"decimal:1,10"],
            'stock'=>['required',"integer"],
            'product'=>['required',"exists:products,id"],
            'description'=>[''],
        ]);
        Article::create([
            'name'=>$request->name,
            'price'=>$request->price, 
            'slug'=>Str::slug($request->name),
            'stock'=>$request->stock,
            'product_id'=>$request->product,
            'description'=>$request->description
        ]);

        return redirect()->route("dashboard-articles-index");
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $products = Product::all();
        return view("admin.articles.edit",['products'=>$products,'article'=>$article]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'name'=>['required',"string","min:2","max:100",Rule::unique("articles")->ignore($article->id)],
            'price'=>['required',"decimal:1,10"],
            'stock'=>['required',"integer"],
            'product'=>['required',"exists:products,id"],
            'description'=>[''],
        ]);
        $article->name = $request->name;
        $article->price = $request->price;
        $article->slug = Str::slug($request->name);
        $article->product_id = $request->product;
        $article->stock= $request->stock;
        $article->description = $request->description; 

        $article->save();
        
        return redirect()->route("dashboard-articles-index");
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route("dashboard-articles-index");
        //
    }
}