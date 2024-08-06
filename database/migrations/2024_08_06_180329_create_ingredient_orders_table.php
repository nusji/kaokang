<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('ingredient_orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->date('date_ordered');
            $table->string('order_detail', 255)->nullable();
            $table->unsignedBigInteger('employee_id'); // สร้างฟิลด์สำหรับอ้างอิง employee_id
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade'); // ตั้งค่า foreign key
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ingredient_orders');
    }
}