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
        Schema::create('order_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity')->nullable(false)->default(0);
            $table->timestamps();
            //FK
            $table->foreignId('order_id')->nullable(false)->references('id')->on('orders')->cascadeOnDelete(); 
            $table->foreignId('product_id')->nullable()->references('id')->on('products')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_requests');
    }
};
