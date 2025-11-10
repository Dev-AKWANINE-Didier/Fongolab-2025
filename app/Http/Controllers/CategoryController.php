<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy("id","ASC")->get();
        return view("admin.categories.index",["categories"=>$categories]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('admin.categories.create',["users"=>$users]);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required','string','min:2','max:200','unique:categories,name'],
            'user'=>['required','exists:users,id'],
            'description'=>[''],
        ]);
        //
        Category::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'user_id'=>$request->user,
            'description'=>$request->description,
        ]);
        return redirect()->route('dashboard-category-index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {   
        $users = User::all();
        return view('admin.categories.edit',['users'=>$users,'category'=>$category]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
        $request->validate([
            'name'=>['required','string','min:2','max:200',Rule::unique('categories')->ignore($category->id)],
            'user'=>['required','exists:users,id'],
            'description'=>[''],
        ]);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->user_id = $request->user;
        $category->description = $request->description;

        $category->save();
        
        return redirect()->route('dashboard-category-index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('dashboard-category-index');
        //
    }
}