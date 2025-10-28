<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    //
    protected $table = 'categories';
    
    // les colonnes 
    protected $fillable = [
        'id',
        'name',
        'slug',
        'description',
        'status',
        'created_at',
        'updated_at'
    ];

    // relation entre Category et User (N à 1)
    public function user():BelongsTo{
        return $this->belongsTo(User::class,'user_id','id');
    }
}