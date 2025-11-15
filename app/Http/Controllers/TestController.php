<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all(); // pour recuperer tous les utilisateurs sans exceptions
        foreach($users as $user){
            echo $user->name.$user->id."<br>";
        }
        $user = User::find(1) ;// pour recuperer l'utilisateur de l'id 1
        var_dump($user->name);

        // $user = User::findOrFail(2); // recuperer l'utilisateur par l'id et on leve une exception si l'utilisateur n'existe
        // var_dump($user);

        $user = User::where("role","=","user")->firstOrFail(); // recuperer le premier utilisateur avec role user
        echo $user->name ."<br>";

        $users = User::where("role","=","user")->get(); // recuperer tous les utilisateurs qui continnent role = user
        foreach($users as $user){
            echo $user->name."<br>";
        }
        $users = User::where("role","=","user")->take(2)->get(); // recuperer 2 premiers utilisateur qui ont role = user
        foreach ($users as $user){
            echo $user->name."<br>";
        }

        $userCount = User::where("role","=","user")->count(); // le nombre total de utilisateur avec le role = user
        echo $userCount."<br>";

        $userCount = User::count(); // le nombre total des utilisateurs
        echo $userCount;

        // inserer, mettre a jour , suppimer 
        // 1. inserer 
            // $user = new User();
            // $user->name = "John";
            // $user->email = "john@gmail.com";
            // $user->role = "admin";
            // $user->password ="123456";
            // $user->save();
            
        
        // 2. Mise a jour 
            // $user = User::find(1); // utilisateur avec l'id 1
            // $user->name = "Claud";
            // $user->email = "claude@gmail.com";
            // $user->role = "user";
    
            // $user->save();
        //3. supprimer 
        //    $user = User::find(8); // l'utilisateur avec l'id 8
        //    $user->delete(); // supprimer l'utilisateur
    }

}