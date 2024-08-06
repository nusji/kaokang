<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuRecipe extends Model
{
    protected $table = 'menu_recipes';
    protected $fillable = [
        'menu_id',
        'ingredient_id',
    ];
    protected $primaryKey = 'menu_recipe_id';

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'menu_id');
    }
}