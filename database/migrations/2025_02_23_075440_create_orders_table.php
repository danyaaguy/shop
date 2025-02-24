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
        Schema::create('orders', function (Blueprint $table) {  
            $table->id(); // ID заказа  
            $table->string('customer_full_name'); // ФИО покупателя  
            $table->enum('status', ['new', 'completed'])->default('new'); // Статус заказа  
            $table->text('customer_comment')->nullable(); // Комментарий покупателя
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Связь с продуктом  
            $table->integer('count'); // Сколько позиций
            $table->timestamps(); // Создание колонок created_at и updated_at  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
