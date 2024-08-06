<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientType extends Model
{
    protected $table = 'ingredients_type'; // Your table name here
    protected $primaryKey = 'ingredient_type_id'; // Your primary key here

    protected $fillable = [
        'ingredient_type_name',
        'ingredient_type_detail'
    ];

    public function ingredients()
    {
        //คือการบอกว่า 1 ประเภทของวัตถุดิบ สามารถมีหลายวัตถุดิบได้ ดังนั้นเราจึงใช้ hasMany ในการบอกว่ามีหลายวัตถุดิบ 
        //โดยมีการส่งค่า 3 ค่า คือ ชื่อคลาสของ Model ที่เราจะเชื่อมโยง ชื่อคอลัมน์ที่เราจะเชื่อมโยงในตาราง ingredients 
        //และชื่อคอลัมน์ที่เราจะเชื่อมโยงในตาราง ingredient_type
        return $this->hasMany(Ingredient::class, 'ingredient_type_id', 'ingredient_type_id');
    }

    public static function isDuplicateType($ingredient_type_name)
    {
        return self::where('ingredient_type_name', $ingredient_type_name)->exists();
    }
}
