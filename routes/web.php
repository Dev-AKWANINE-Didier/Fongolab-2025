<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;


// Route::get('/', function () {
//     return view('welcome');
// });







Route::middleware("auth")->group(function(){
// pour les admin


// pour les utilisateurs simple 
Route::get("/user",function(){
    return view("user.index");
})->name("home")->middleware(["role:user"]);


// les routes pour Amin
Route::middleware("role:admin")->group(function(){
    Route::get("/",function(){
     return view('admin.index');
    })->name('dashboard');
        // les routes pour UserController 
    // lister les utilisateurs
    Route::get("dashboard/user/index/",[UserController::class,'index'])->name("dashboard-user-index");
    //  route =>formulaire pour creer un utilisateurs
    Route::get('dashboard/user/create/',[UserController::class,'create'])->name('dashboard-user-create');
    // routes => store de l'utilisateurs. 
    Route::post('dashboard/user/index/',[UserController::class,'store'])->name('dashboard-user-store');
    // route pour afficher le formulaire de la modification
    Route::get("dashboard/user/edit/{user}/",[UserController::class,'edit'])->name('dashboard-user-edit');
    // route pour la modification 
    Route::put('dashboard/user/update/{user}/',[UserController::class,'update'])->name('dashboard-user-update');
    // route pour la suppression 
    Route::delete("dashboard/user/delete/{user}/",[UserController::class, 'destroy'])->name('dashboard-user-delete');
    // route le detail 
    Route::get("dashboard/user/show/{user}/",[UserController::class,'show'])->name('dashboard-user-show');
    
    
    
    
    // routes pour les categories 
    Route::get('dashboard/category/index/',[CategoryController::class,'index'])->name('dashboard-category-index');
    Route::get('dashboard/category/create/',[CategoryController::class,'create'])->name('dashboard-category-create');
    Route::post("dashboard/category/store/",[CategoryController::class, 'store'])->name("dashboard-category-store");
    Route::get("dashboard/category/show/{slug}/",[CategoryController::class, 'show'])->name("dashboard-category-show");
    Route::get("dashboard/category/edit/{category}/",[CategoryController::class, 'edit'])->name("dashboard-category-edit");
    Route::put("dashboard/category/update/{category}/",[CategoryController::class, 'update'])->name("dashboard-category-update");
    Route::delete("dashboard/category/delete/{category}/",[CategoryController::class, 'destroy'])->name("dashboard-category-delete");
    
    
    // les routes pour les produits 
    Route::get("dashboard/products/index/",[ProductController::class,'index'])->name('dashboard-products-index');
    Route::get("dashboard/products/create/",[ProductController::class, 'create'])->name('dashboard-products-create');
    Route::post('dashboard/products/store/',[ProductController::class, 'store'])->name('dashboard-products-store');
    Route::get('dashboard/products/edit/{product}/',[ProductController::class,'edit'])->name('dashboard-products-edit');
    Route::put("dashboard/products/update/{product}/",[ProductController::class,'update'])->name('dashboard-products-update');
    Route::delete('dashboard/products/delete/{product}/',[ProductController::class,'destroy'])->name('dashboard-products-delete');
    
    // les routes pour les articles 
    Route::get("dashboard/articles/index/",[ArticleController::class,'index'])->name("dashboard-articles-index");
    Route::get("dashboard/articles/create/",[ArticleController::class,'create'])->name("dashboard-articles-create");
    Route::post("dashboard/articles/store/",[ArticleController::class,'store'])->name("dashboard-articles-store");
    Route::get("dashboard/articles/edit/{article}",[ArticleController::class,'edit'])->name("dashboard-articles-edit");
    Route::put("dashboard/articles/update/{article}",[ArticleController::class,'update'])->name("dashboard-articles-update");
    Route::delete("dashboard/articles/delete/{article}",[ArticleController::class,'destroy'])->name("dashboard-articles-delete");
    Route::get("dashboard/articles/show/{article}/",[ArticleController::class, 'show'])->name("dashbaord-articles-show");
    
    // routes pour testController fait pour la recapitulation
    Route::get("test/",[TestController::class,'index']);
    
    
    // les routes pour Animals 
    Route::get("animals/index/",[AnimalController::class,'index'])->name("animals-index");
    Route::get("animals/create/",[AnimalController::class,'create'])->name("animals-create");
    Route::post("animals/store/",[AnimalController::class, 'store'])->name("animals-store");
    Route::get("animals/edit/{animal}",[AnimalController::class, 'edit'])->name("animals-edit");
    Route::put("animals/update/{animal}",[AnimalController::class, 'update'])->name("animals-update");
    Route::delete("animals/delete/{animal}",[AnimalController::class, 'destroy'])->name("animals-delete");
    Route::get("animals/show/{animal}",[AnimalController::class, 'show'])->name("animals-show");
    });
});