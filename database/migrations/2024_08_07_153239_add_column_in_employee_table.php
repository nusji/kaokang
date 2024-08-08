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
            $table->string('image_path')->nullable(); // ฟิลด์สำหรับเก็บรูปภาพพนักงาน
            $table->softDeletes(); // เพิ่มฟิลด์ deleted_at สำหรับเก็บวันที่ลบข้อมูล
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('image_path');
            $table->dropSoftDeletes();
        });
    }
};
