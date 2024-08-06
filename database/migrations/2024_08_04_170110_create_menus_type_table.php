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
        Schema::create('menus_type', function (Blueprint $table) {
            $table->id('menu_type_id'); // รหัสประเภทเมนู
            $table->string('menu_type_name'); // ชื่อประเภทเมนู
            $table->string('menu_type_detail')->nullable(); // รายละเอียดประเภทเมนู
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus_type');
    }
};
