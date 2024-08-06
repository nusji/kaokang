<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $table = 'ingredients'; // Your table name here
    protected $primaryKey = 'ingredient_id'; // Your primary key here

    protected $fillable = [
        'ingredient_name',
        'ingredient_detail',
        'ingredient_type_id',
        'ingredient_unit',
    ];
    protected $attributes = [
        'ingredient_quantity' => 0.00,
    ];

    public function ingredientType()
    {
        return $this->belongsTo(IngredientType::class, 'ingredient_type_id', 'ingredient_type_id');
    }

    public static function isDuplicateIngredient($ingredient_name)
    {
        return self::where('ingredient_name', $ingredient_name)->exists();
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'menu_recipes')
                    ->withPivot('quantity');
    }
}
