<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientOrderDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('ingredient_order_details', function (Blueprint $table) {
            $table->id('orderDetail_id');
            
            $table->foreignId('order_id')
            ->constrained('ingredient_orders')
            ->onDelete('cascade');

            $table->foreignId('Ingredient_id')
            ->constrained('ingredients');

            $table->integer('Quantity');
            $table->decimal('Price', 8, 2);
            $table->string('IngredientUnit', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ingredient_order_details');
    }
}