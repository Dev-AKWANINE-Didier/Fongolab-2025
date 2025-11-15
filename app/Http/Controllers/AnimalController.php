<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // affichaga de tous les animaux
        $animals = Animal::all();

        return view("animals.index",["animals"=>$animals]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("animals.create");
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required',"string"],
            'cry'=>['required','string'],
            'age'=>['required','integer'],
            'image'=>['image','required','mimes:png,jpg']
        ]);

        if($request->hasFile("image")){
            // recuper l'image 
            $file = $request->file("image");
            $fileName = time()."_".$file->getClientOriginalName();

            // stocker l'image le dossier storage/app/public/animals
            $path = $file->storeAs("animals",$fileName,"public");
        }

        Animal::create([
            'name'=>$request->name,
            'cry'=>$request->cry,
            'age'=>$request->age,
            'image'=>$fileName,
        ]);
        return redirect()->route("animals-index");
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
        return view("animals.show",['animal'=>$animal]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal)
    {
        return view("animals.edit",['animal'=>$animal]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Animal $animal)
    {
        $request->validate([
            'name'=>['required',"string"],
            'cry'=>['required','string'],
            'age'=>['required','integer'],
            'image'=>['image','required','mimes:png,jpg']
        ]);

        if($request->hasFile("image")){
            // recuper l'image 
            $file = $request->file("image");
            $fileName = time()."_".$file->getClientOriginalName();

            // stocker l'image le dossier storage/app/public/animals
            $path = $file->storeAs("animals",$fileName,"public");
        }
        $animal->name = $request->name;
        $animal->cry = $request->cry;
        $animal->age = $request->age;   
        $animal->image = $fileName;
        $animal->save(); //
        
        return redirect()->route("animals-index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();
        return redirect()->route("animals-index");
        //
    }
}