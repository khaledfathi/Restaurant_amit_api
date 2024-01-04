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
        Schema::create('history_orders', function (Blueprint $table) {
            $table->id();
            $table->datetime('time')->nullable(false); 
            $table->enum('status',['in progress' , 'complete'])->nullable(false);
            $table->double('total')->nullable(false)->default(0); 
            $table->timestamps();
            //FK
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();            
 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_orders');
    }
};
