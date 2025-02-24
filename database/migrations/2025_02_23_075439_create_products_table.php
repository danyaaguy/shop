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
        Schema::create('products', function (Blueprint $table) {  
            $table->id(); // ID товара  
            $table->string('name'); // Название товара  
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Связь с категорией  
            $table->text('description')->nullable(); // Описание товара  
            $table->decimal('price', 10, 2); // Цена товара  
            $table->timestamps();  
        });  
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
