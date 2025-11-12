<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{

    protected $table = "articles";
    protected $fillable = [
        'id',
        'product_id',
        'name',
        'slug',
        'status',
        'price',
        'stock',
        'description',
        'image',
        'created_at',
        'updated_at'
    ];

    // relation entre Article et Produit 
    public function product():BelongsTo{
        return $this->belongsTo(Product::class);
    }
}