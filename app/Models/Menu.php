<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Menu.php

class Menu extends Model
{
    protected $table = "menus"; // Define the table name
    
    protected $fillable = [
        'menu_name',
        'menu_type_id',
        'menu_price',
    ];

    protected $primaryKey = 'menu_id'; // Define the primary key
    public $incrementing = false; // Set to true if using auto-increment
    protected $keyType = 'string'; // Change to 'int' if using integer

    public function recipes()
    {
        return $this->hasMany(MenuRecipe::class, 'menu_id', 'menu_id');
    }

    public function menuType()
    {
        return $this->belongsTo(MenuType::class, 'menu_type_id', 'menu_type_id');
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'menu_recipes', 'menu_id', 'ingredient_id')
                    ->withPivot('quantity');
    }
    

}


