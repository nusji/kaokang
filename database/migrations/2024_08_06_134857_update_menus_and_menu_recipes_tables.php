<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMenusAndMenuRecipesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // อัปเดตตาราง menus
        Schema::table('menus', function (Blueprint $table) {
            // ลบ foreign key ที่มีอยู่ก่อน
            $table->dropForeign(['menu_type_id']);

            // เพิ่ม foreign key ใหม่
            $table->foreign('menu_type_id')
                ->references('menu_type_id')
                ->on('menus_type')
                ->onDelete('cascade');
        });

        // อัปเดตตาราง menu_recipes
        Schema::table('menu_recipes', function (Blueprint $table) {
            // ลบ foreign key ที่มีอยู่ก่อน
            $table->dropForeign(['menu_id']);
            $table->dropForeign(['ingredient_id']);

            // เพิ่ม foreign key ใหม่
            $table->foreign('menu_id')
                ->references('menu_id')
                ->on('menus')
                ->onDelete('cascade');

            $table->foreign('ingredient_id')
                ->references('ingredient_id')
                ->on('ingredients')
                ->onDelete('cascade');

            $table->decimal('quantity', 8, 2); // ปริมาณของวัตถุดิบ
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // ถ้าต้องการย้อนกลับการเปลี่ยนแปลง
        Schema::table('menus', function (Blueprint $table) {
            $table->dropForeign(['menu_type_id']);
            // คืนค่า foreign key เก่าหากจำเป็น
            // $table->foreign('menu_type_id')
            //     ->references('menu_type_id')
            //     ->on('menus_type')
            //     ->onDelete('restrict');
        });

        Schema::table('menu_recipes', function (Blueprint $table) {
            $table->dropForeign(['menu_id']);
            $table->dropForeign(['ingredient_id']);
            // คืนค่า foreign key เก่าหากจำเป็น
            // $table->foreign('menu_id')
            //     ->references('menu_id')
            //     ->on('menus')
            //     ->onDelete('restrict');
            // $table->foreign('ingredient_id')
            //     ->references('ingredient_id')
            //     ->on('ingredients')
            //     ->onDelete('restrict');
        });
    }
}
