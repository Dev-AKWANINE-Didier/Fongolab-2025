<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    //
    protected $table = "animals";
    protected $fillable = ['id',"name","cry","age","image",'created_at','updated_at'];
}