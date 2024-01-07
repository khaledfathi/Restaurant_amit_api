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
            $table->id();
            $table->string('name',255)->nullable(false); 
            $table->text('image')->nullable(false)->default(DEFAULT_PRODUCT_IMAGE); 
            $table->integer('quantity')->nullable(false)->default=0; 
            $table->double('price')->nullable(false)->default=0; 
            $table->double('discount')->nullable(false)->default=0; 
            $table->timestamps();
            //FK
            $table->foreignId('product_category_id')->references('id')->on('product_categories')->cascadeOnDelete(); 
            $table->foreignId('restaurant_id')->references('id')->on('restaurants')->cascadeOnDelete(); 
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
