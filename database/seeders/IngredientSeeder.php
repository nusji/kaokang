<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ingredients')->insert([
            ['ingredient_name' => 'เนื้อไก่', 'ingredient_type_id' => 15, 'ingredient_unit' => 'กรัม'],
            ['ingredient_name' => 'เนื้อหมู', 'ingredient_type_id' => 15, 'ingredient_unit' => 'กรัม'],
            ['ingredient_name' => 'เนื้อวัว', 'ingredient_type_id' => 15, 'ingredient_unit' => 'กรัม'],
            ['ingredient_name' => 'เนื้อปลา', 'ingredient_type_id' => 15, 'ingredient_unit' => 'กรัม'],
            ['ingredient_name' => 'กุ้ง', 'ingredient_type_id' => 15, 'ingredient_unit' => 'กรัม'],
            ['ingredient_name' => 'ปลาหมึก', 'ingredient_type_id' => 15, 'ingredient_unit' => 'กรัม'],
            ['ingredient_name' => 'เนื้อแกะ', 'ingredient_type_id' => 15, 'ingredient_unit' => 'กรัม'],
            ['ingredient_name' => 'เนื้อเป็ด', 'ingredient_type_id' => 15, 'ingredient_unit' => 'กรัม'],
            ['ingredient_name' => 'เนื้อแพะ', 'ingredient_type_id' => 15, 'ingredient_unit' => 'กรัม'],
            ['ingredient_name' => 'เนื้อกระต่าย', 'ingredient_type_id' => 15, 'ingredient_unit' => 'กรัม'],
            ['ingredient_name' => 'ปลาแซลมอน', 'ingredient_type_id' => 15, 'ingredient_unit' => 'กรัม'],
            ['ingredient_name' => 'ปลาทูน่า', 'ingredient_type_id' => 15, 'ingredient_unit' => 'กรัม'],
            ['ingredient_name' => 'ปลากระพง', 'ingredient_type_id' => 15, 'ingredient_unit' => 'กรัม'],
            ['ingredient_name' => 'ปลานิล', 'ingredient_type_id' => 15, 'ingredient_unit' => 'กรัม'],
            ['ingredient_name' => 'หอยแมลงภู่', 'ingredient_type_id' => 15, 'ingredient_unit' => 'กรัม'],
            ['ingredient_name' => 'หอยเชลล์', 'ingredient_type_id' => 15, 'ingredient_unit' => 'กรัม'],
            ['ingredient_name' => 'ปู', 'ingredient_type_id' => 15, 'ingredient_unit' => 'กรัม'],
            ['ingredient_name' => 'หมึกกระดอง', 'ingredient_type_id' => 15, 'ingredient_unit' => 'กรัม'],
            ['ingredient_name' => 'ไข่ไก่', 'ingredient_type_id' => 15, 'ingredient_unit' => 'ฟอง'],
            ['ingredient_name' => 'ไข่เป็ด', 'ingredient_type_id' => 15, 'ingredient_unit' => 'ฟอง'],

            // เครื่องเทศ
            ['ingredient_name' => 'กระเทียม', 'ingredient_type_id' => 16, 'ingredient_unit' => 'กลีบ'],
            ['ingredient_name' => 'หอมแดง', 'ingredient_type_id' => 16, 'ingredient_unit' => 'หัว'],
            ['ingredient_name' => 'ตะไคร้', 'ingredient_type_id' => 16, 'ingredient_unit' => 'ต้น'],
            ['ingredient_name' => 'ใบมะกรูด', 'ingredient_type_id' => 16, 'ingredient_unit' => 'ใบ'],
            ['ingredient_name' => 'ข่า', 'ingredient_type_id' => 16, 'ingredient_unit' => 'ชิ้น'],
            ['ingredient_name' => 'ขิง', 'ingredient_type_id' => 16, 'ingredient_unit' => 'ชิ้น'],
            ['ingredient_name' => 'พริกไทย', 'ingredient_type_id' => 16, 'ingredient_unit' => 'ช้อนชา'],
            ['ingredient_name' => 'ลูกผักชี', 'ingredient_type_id' => 16, 'ingredient_unit' => 'ช้อนชา'],
            ['ingredient_name' => 'ยี่หร่า', 'ingredient_type_id' => 16, 'ingredient_unit' => 'ช้อนชา'],
            ['ingredient_name' => 'โป๊ยกั๊ก', 'ingredient_type_id' => 16, 'ingredient_unit' => 'ชิ้น'],
            ['ingredient_name' => 'อบเชย', 'ingredient_type_id' => 16, 'ingredient_unit' => 'ชิ้น'],
            ['ingredient_name' => 'กระวาน', 'ingredient_type_id' => 16, 'ingredient_unit' => 'เม็ด'],
            ['ingredient_name' => 'พริกแห้ง', 'ingredient_type_id' => 16, 'ingredient_unit' => 'เม็ด'],
            ['ingredient_name' => 'พริกขี้หนู', 'ingredient_type_id' => 16, 'ingredient_unit' => 'เม็ด'],
            ['ingredient_name' => 'ผงขมิ้น', 'ingredient_type_id' => 16, 'ingredient_unit' => 'ช้อนชา'],
            ['ingredient_name' => 'ผงกระหรี่', 'ingredient_type_id' => 16, 'ingredient_unit' => 'ช้อนชา'],
            ['ingredient_name' => 'ดอกจันทน์', 'ingredient_type_id' => 16, 'ingredient_unit' => 'ชิ้น'],
            ['ingredient_name' => 'พริกชี้ฟ้า', 'ingredient_type_id' => 16, 'ingredient_unit' => 'เม็ด'],
            ['ingredient_name' => 'เม็ดมะม่วงหิมพานต์', 'ingredient_type_id' => 16, 'ingredient_unit' => 'เม็ด'],
            ['ingredient_name' => 'ลูกจันทน์เทศ', 'ingredient_type_id' => 16, 'ingredient_unit' => 'ชิ้น'],

            // พริกแกง
            ['ingredient_name' => 'พริกแกงเขียวหวาน', 'ingredient_type_id' => 17, 'ingredient_unit' => 'ถ้วย'],
            ['ingredient_name' => 'พริกแกงแดง', 'ingredient_type_id' => 17, 'ingredient_unit' => 'ถ้วย'],
            ['ingredient_name' => 'พริกแกงส้ม', 'ingredient_type_id' => 17, 'ingredient_unit' => 'ถ้วย'],
            ['ingredient_name' => 'พริกแกงมัสมั่น', 'ingredient_type_id' => 17, 'ingredient_unit' => 'ถ้วย'],
            ['ingredient_name' => 'พริกแกงเผ็ด', 'ingredient_type_id' => 17, 'ingredient_unit' => 'ถ้วย'],
            ['ingredient_name' => 'พริกแกงพะแนง', 'ingredient_type_id' => 17, 'ingredient_unit' => 'ถ้วย'],
            ['ingredient_name' => 'พริกแกงป่า', 'ingredient_type_id' => 17, 'ingredient_unit' => 'ถ้วย'],
            ['ingredient_name' => 'พริกแกงหน่อไม้', 'ingredient_type_id' => 17, 'ingredient_unit' => 'ถ้วย'],
            ['ingredient_name' => 'พริกแกงน้ำยา', 'ingredient_type_id' => 17, 'ingredient_unit' => 'ถ้วย'],
            ['ingredient_name' => 'พริกแกงผัดไทย', 'ingredient_type_id' => 17, 'ingredient_unit' => 'ถ้วย'],
            ['ingredient_name' => 'พริกแกงเต้าเจี้ยว', 'ingredient_type_id' => 17, 'ingredient_unit' => 'ถ้วย'],
            ['ingredient_name' => 'พริกแกงข้าวซอย', 'ingredient_type_id' => 17, 'ingredient_unit' => 'ถ้วย'],
            ['ingredient_name' => 'พริกแกงแหนม', 'ingredient_type_id' => 17, 'ingredient_unit' => 'ถ้วย'],
            ['ingredient_name' => 'พริกแกงห่อหมก', 'ingredient_type_id' => 17, 'ingredient_unit' => 'ถ้วย'],
            ['ingredient_name' => 'พริกแกงโฮม', 'ingredient_type_id' => 17, 'ingredient_unit' => 'ถ้วย'],
            ['ingredient_name' => 'พริกแกงกะหรี่', 'ingredient_type_id' => 17, 'ingredient_unit' => 'ถ้วย'],
            ['ingredient_name' => 'พริกแกงต้มข่า', 'ingredient_type_id' => 17, 'ingredient_unit' => 'ถ้วย'],
            ['ingredient_name' => 'พริกแกงยำ', 'ingredient_type_id' => 17, 'ingredient_unit' => 'ถ้วย'],
            ['ingredient_name' => 'พริกแกงเปรี้ยวหวาน', 'ingredient_type_id' => 17, 'ingredient_unit' => 'ถ้วย'],
            ['ingredient_name' => 'พริกแกงน้ำนัว', 'ingredient_type_id' => 17, 'ingredient_unit' => 'ถ้วย'],

            // เครื่องปรุงรส
            ['ingredient_name' => 'น้ำปลา', 'ingredient_type_id' => 18, 'ingredient_unit' => 'ขวด'],
            ['ingredient_name' => 'กะปิ', 'ingredient_type_id' => 18, 'ingredient_unit' => 'ช้อนโต๊ะ'],
            ['ingredient_name' => 'น้ำตาลปี๊บ', 'ingredient_type_id' => 18, 'ingredient_unit' => 'ก้อน'],
            ['ingredient_name' => 'น้ำมะขามเปียก', 'ingredient_type_id' => 18, 'ingredient_unit' => 'ขวด'],
            ['ingredient_name' => 'มะนาว', 'ingredient_type_id' => 18, 'ingredient_unit' => 'ลูก'],
            ['ingredient_name' => 'ซีอิ๊วขาว', 'ingredient_type_id' => 18, 'ingredient_unit' => 'ขวด'],
            ['ingredient_name' => 'ซอสหอยนางรม', 'ingredient_type_id' => 18, 'ingredient_unit' => 'ขวด'],
            ['ingredient_name' => 'ซอสมะเขือเทศ', 'ingredient_type_id' => 18, 'ingredient_unit' => 'ขวด'],
            ['ingredient_name' => 'ซอสพริก', 'ingredient_type_id' => 18, 'ingredient_unit' => 'ขวด'],
            ['ingredient_name' => 'น้ำมันหอย', 'ingredient_type_id' => 18, 'ingredient_unit' => 'ขวด'],
            ['ingredient_name' => 'น้ำมันงา', 'ingredient_type_id' => 18, 'ingredient_unit' => 'ขวด'],
            ['ingredient_name' => 'ผงชูรส', 'ingredient_type_id' => 18, 'ingredient_unit' => 'ช้อนชา'],
            ['ingredient_name' => 'ผงปรุงรส', 'ingredient_type_id' => 18, 'ingredient_unit' => 'ช้อนชา'],
            ['ingredient_name' => 'น้ำตาลทราย', 'ingredient_type_id' => 18, 'ingredient_unit' => 'ถ้วย'],
            ['ingredient_name' => 'น้ำมะนาว', 'ingredient_type_id' => 18, 'ingredient_unit' => 'ลูก'],
            ['ingredient_name' => 'น้ำส้มสายชู', 'ingredient_type_id' => 18, 'ingredient_unit' => 'ขวด'],
            ['ingredient_name' => 'น้ำมันพืช', 'ingredient_type_id' => 18, 'ingredient_unit' => 'ขวด'],
            ['ingredient_name' => 'น้ำมันมะกอก', 'ingredient_type_id' => 18, 'ingredient_unit' => 'ขวด'],
            ['ingredient_name' => 'น้ำจิ้มสุกี้', 'ingredient_type_id' => 18, 'ingredient_unit' => 'ขวด'],
            ['ingredient_name' => 'น้ำจิ้มแจ่ว', 'ingredient_type_id' => 18, 'ingredient_unit' => 'ขวด'],

            // กะทิ
            ['ingredient_name' => 'กะทิสด', 'ingredient_type_id' => 19, 'ingredient_unit' => 'ขวด'],
            ['ingredient_name' => 'กะทิกระป๋อง', 'ingredient_type_id' => 19, 'ingredient_unit' => 'กระป๋อง'],
            ['ingredient_name' => 'กะทิสำเร็จรูป', 'ingredient_type_id' => 19, 'ingredient_unit' => 'กล่อง'],
            ['ingredient_name' => 'กะทิแบบผง', 'ingredient_type_id' => 19, 'ingredient_unit' => 'ซอง'],
            ['ingredient_name' => 'กะทิกล่อง', 'ingredient_type_id' => 19, 'ingredient_unit' => 'กล่อง'],
            ['ingredient_name' => 'กะทิแบบขวด', 'ingredient_type_id' => 19, 'ingredient_unit' => 'ขวด'],
            ['ingredient_name' => 'กะทิแช่เย็น', 'ingredient_type_id' => 19, 'ingredient_unit' => 'ขวด'],
            ['ingredient_name' => 'กะทิออร์แกนิก', 'ingredient_type_id' => 19, 'ingredient_unit' => 'ขวด'],
            ['ingredient_name' => 'กะทิจากมะพร้าว', 'ingredient_type_id' => 19, 'ingredient_unit' => 'ขวด'],
            ['ingredient_name' => 'กะทิปรุงรส', 'ingredient_type_id' => 19, 'ingredient_unit' => 'ขวด'],
            ['ingredient_name' => 'กะทิชนิดเข้มข้น', 'ingredient_type_id' => 19, 'ingredient_unit' => 'ขวด'],
            ['ingredient_name' => 'กะทิแบบกระป๋องใหญ่', 'ingredient_type_id' => 19, 'ingredient_unit' => 'กระป๋อง'],
            ['ingredient_name' => 'กะทิธรรมชาติ', 'ingredient_type_id' => 19, 'ingredient_unit' => 'ขวด'],
            ['ingredient_name' => 'กะทิอาเซียน', 'ingredient_type_id' => 19, 'ingredient_unit' => 'ขวด'],
            ['ingredient_name' => 'กะทิเค็ม', 'ingredient_type_id' => 19, 'ingredient_unit' => 'ขวด'],
            ['ingredient_name' => 'กะทิหวาน', 'ingredient_type_id' => 19, 'ingredient_unit' => 'ขวด'],
            ['ingredient_name' => 'กะทิใหม่', 'ingredient_type_id' => 19, 'ingredient_unit' => 'ขวด'],
            ['ingredient_name' => 'กะทิจากน้ำมะพร้าว', 'ingredient_type_id' => 19, 'ingredient_unit' => 'ขวด'],
            ['ingredient_name' => 'กะทิใช้ในขนม', 'ingredient_type_id' => 19, 'ingredient_unit' => 'ขวด'],
            ['ingredient_name' => 'กะทิสูตรเข้มข้น', 'ingredient_type_id' => 19, 'ingredient_unit' => 'ขวด'],

            // ผัก
            ['ingredient_name' => 'มะเขือ', 'ingredient_type_id' => 20, 'ingredient_unit' => 'ลูก'],
            ['ingredient_name' => 'ถั่วฝักยาว', 'ingredient_type_id' => 20, 'ingredient_unit' => 'ฝัก'],
            ['ingredient_name' => 'ใบโหระพา', 'ingredient_type_id' => 20, 'ingredient_unit' => 'ใบ'],
            ['ingredient_name' => 'ผักชี', 'ingredient_type_id' => 20, 'ingredient_unit' => 'ต้น'],
            ['ingredient_name' => 'มะเขือเทศ', 'ingredient_type_id' => 20, 'ingredient_unit' => 'ลูก'],
            ['ingredient_name' => 'หน่อไม้', 'ingredient_type_id' => 20, 'ingredient_unit' => 'ก้อน'],
            ['ingredient_name' => 'พริก', 'ingredient_type_id' => 20, 'ingredient_unit' => 'ลูก'],
            ['ingredient_name' => 'คะน้า', 'ingredient_type_id' => 20, 'ingredient_unit' => 'ต้น'],
            ['ingredient_name' => 'กะหล่ำปลี', 'ingredient_type_id' => 20, 'ingredient_unit' => 'หัว'],
            ['ingredient_name' => 'ผักกาดขาว', 'ingredient_type_id' => 20, 'ingredient_unit' => 'หัว'],
            ['ingredient_name' => 'ฟักทอง', 'ingredient_type_id' => 20, 'ingredient_unit' => 'ลูก'],
            ['ingredient_name' => 'แครอท', 'ingredient_type_id' => 20, 'ingredient_unit' => 'หัว'],
            ['ingredient_name' => 'สับปะรด', 'ingredient_type_id' => 20, 'ingredient_unit' => 'ลูก'],
            ['ingredient_name' => 'มะละกอ', 'ingredient_type_id' => 20, 'ingredient_unit' => 'ลูก'],
            ['ingredient_name' => 'ถั่วพู', 'ingredient_type_id' => 20, 'ingredient_unit' => 'ฝัก'],
        ]);
    }
}
