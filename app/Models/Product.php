<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'price'];

    public function media(): HasMany
    {
        return $this->hasMany(ProductMedia::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
