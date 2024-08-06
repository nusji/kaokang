<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menu_recipes', function (Blueprint $table) {
            $table->id('menu_recipe_id'); // รหัสสูตรอาหาร
            $table->foreignId('menu_id') // รหัสเมนูอ้างอิงจากตารางเมนู
                ->constrained('menus', 'menu_id'); 
            $table->foreignId('ingredient_id') // รหัสวัตถุดิบอ้างอิงจากตารางวัตถุดิบ
            ->constrained('ingredients','ingredient_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_recipes');
    }
};
