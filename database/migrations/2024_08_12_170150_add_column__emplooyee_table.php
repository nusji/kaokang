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
        Schema::table('employees', function (Blueprint $table) {
            $table->string('id_card_number')->unique(); // เลขบัตรประจำตัวประชาชน
            $table->string('id_card_image')->nullable(); // รูปสำเนาบัตรประชาชน
            $table->renameColumn('phone_number', 'tel'); // เปลี่ยนชื่อฟิลด์
            $table->enum('employment_status', ['full_time', 'part_time']); // สถานะการจ้างงาน
            $table->date('start_date'); // วันที่เริ่มงาน
            $table->enum('work_status', ['active', 'inactive']); // สถานะการทำงาน
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            //
        });
    }
};
