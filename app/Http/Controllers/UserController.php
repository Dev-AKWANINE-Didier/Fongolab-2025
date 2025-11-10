<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $users = User::all();
        

        return view('admin.users.index',['users'=>$users]);
        
        //
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required','string','min:2','max:100'],
            'email'=>['required','email','max:100','unique:users,email']
        ],[
            'name.required'=>'Le nom est obligatoire',
            'name.string'=>'Le nom doit une chaine de caractere',
            'name.min'=>'Le nom ne doit contenir moins de 2 chaine de caractere',
            'email.required'=>"L'email est obligatoire",
            'email.email'=>"L'email est invalide",
            'email.unique'=>"L'email existe déjà",

        ]);
        
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make('user12345678'),
            'role'=>'user',
        ]);
        return redirect()->route('dashboard-user-index');
        
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        return view('admin.users.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit',['user'=>$user]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=>['required','string','min:2','max:100'],
            'email'=>['required','email','max:100',Rule::unique('users')->ignore($user->id)]
        ],[
            'name.required'=>'Le nom est obligatoire',
            'name.string'=>'Le nom doit une chaine de caractere',
            'name.min'=>'Le nom ne doit contenir moins de 2 chaine de caractere',
            'email.required'=>"L'email est obligatoire",
            'email.email'=>"L'email est invalide",
            'email.unique'=>"L'email existe déjà",

        ]);
        $user->name = $request->name; 
        $user->email = $request->email;
        $user->save();

        return redirect()->route('dashboard-user-index');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard-user-index');
        //
    }
}