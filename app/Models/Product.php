<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    
    protected $table = "products";

    protected $fillable=[
        'id',
        'category_id',
        'name',
        'slug',
        'status',
        'description',
        'created_at',
        'updated_at'
    ];
    //
    public function category():BelongsTo{
        return $this->belongsTo(Category::class);
    }

    // relation entre Produit et Articles 
    public function articles():HasMany{
        return $this->hasMany(Article::class);
    }
}