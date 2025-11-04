<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});
Route::get("dashbaord/",function(){
 return view('admin.index');
})->name('dashboard');


Route::get("admin/lists/",[UserController::class, 'index'])->name("admin-list");

Route::get("home/",[TestController::class,"index"])->name('index');

// les routes pour la partie dashoard
// index de dashboard
Route::get("dashboard/index/",[TestController::class, 'dashboardIndex'])->name("dashbaord-index");


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