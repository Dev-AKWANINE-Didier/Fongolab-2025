<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    //
    protected $table = 'categories';
    
    // les colonnes 
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'slug',
        'description',
        'status',
        'created_at',
        'updated_at'
    ];

    // relation entre Category et User (N à 1)
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    
    // relation entre Category et Product 
    public function products():HasMany{
        return $this->hasMany(Product::class);
    }

    // public function users():BelongsToMany{
    //     return $this->belongsToMany(User::class);

    // }

}