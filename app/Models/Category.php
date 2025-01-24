<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ['nombre', 'color'];
    public $timestamps = false; // Para indicar que categoría no tiene el campo timestamp?
    
    public function products(): HasMany
    { 
        return $this->hasMany(Product::class); // Una categoría puede pertenecer a muchos productos
    }
}
