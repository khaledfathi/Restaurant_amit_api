<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->datetime('time')->nullable(false)->default(Carbon::now());
            $table->enum('status',['in progress' , 'complete'])->nullable(false)->default('in progress');
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
        Schema::dropIfExists('orders');
    }
};
