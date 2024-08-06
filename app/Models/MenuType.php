<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuType extends Model
{
    
    use HasFactory;
    protected $table = 'menus_type'; // Your table name here
    protected $primaryKey = 'menu_type_id'; // Your primary key here
    protected $fillable = [
        'menu_type_name',
        'menu_type_detail',
    ];
}
