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
        Schema::create('history_order_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity')->nullable(false);
            $table->string('product_name',255)->nullable(false);
            $table->double('price')->nullable(false);
            $table->double('discount')->nullable(false);
            $table->string('image')->nullable(false);
            $table->timestamps();
            //FK
            $table->foreignId('order_id')->nullable(false)->references('id')->on('orders')->cascadeOnDelete(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_order_requests');
    }
};
