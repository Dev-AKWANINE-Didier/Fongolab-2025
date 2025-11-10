<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;


// Route::get('/', function () {
//     return view('welcome');
// });
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
Route::get("dashboard/category/edit/{category}",[CategoryController::class, 'edit'])->name("dashboard-category-edit");
Route::put("dashboard/category/update/{category}",[CategoryController::class, 'update'])->name("dashboard-category-update");
Route::delete("dashboard/category/delete/{category}",[CategoryController::class, 'destroy'])->name("dashboard-category-delete");