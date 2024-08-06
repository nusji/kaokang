<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // เพิ่มบรรทัดนี้

class MenuTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menus_type')->insert([
            ['menu_type_name' => 'แกง', 'menu_type_detail' => 'อาหารที่มีน้ำแกงหรือซุป'],
            ['menu_type_name' => 'ผัด', 'menu_type_detail' => 'อาหารที่ใช้การผัด'],
            ['menu_type_name' => 'ทอด', 'menu_type_detail' => 'อาหารที่ใช้การทอด'],
            ['menu_type_name' => 'ต้ม', 'menu_type_detail' => 'อาหารที่ใช้การต้ม'],
            ['menu_type_name' => 'ยำ', 'menu_type_detail' => 'อาหารที่มีรสชาติเปรี้ยวเผ็ดจากน้ำยำ'],
            ['menu_type_name' => 'นึ่ง', 'menu_type_detail' => 'อาหารที่ใช้การนึ่ง'],
        ]);
    }
}
