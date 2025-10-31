<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
            'name'=>['required','max:100','string'],
            'email'=>['required','email','unique:users,email','max:100']
        ],[
            'name.required'=>'Veuillez founir le nom ',
            'email.required'=>"Veuillez founir l'email ",
            'email.email'=>"Votre email est invalid",
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make("user12345678"),
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
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}