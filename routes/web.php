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
Route::get("dashboard/index/",[TestController::class, 'dashboardIndex'])->name("dashbaord-index");

// les routes pour UserController 
Route::get("dashbaord/user/index/",[UserController::class,'index'])->name("dashboard-user-index");



// Route::get('dashbaord/user/index/',[UserController::class,'index'])->name('dashboard-user-index');
Route::get('dashbaord/user/create/',[UserController::class,'create'])->name('dashboard-user-create');
Route::post('dashbaord/user/index/',[UserController::class,'store'])->name('dashboard-user-store');