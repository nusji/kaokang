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
        Schema::create('menus', function (Blueprint $table) {
            $table->id('menu_id'); // รหัสเมนู
            $table->string('menu_name'); // ชื่อเมนู
            $table->string('menu_detail')->nullable(); // รายละเอียดเมนู
            $table->foreignId('menu_type_id') // รหัสประเภทเมนูอ้างอิงจากตารางประเภทเมนู
            ->constrained('menus_type', 'menu_type_id');
            $table->double('menu_price', 10, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
