<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable(false)->unique();
            $table->string('phone', 255)->nullable();
            $table->text('address')->nullable();
            $table->text('image')->nullable();
            $table->double('lat')->nullable();
            $table->double('long')->nullable();
            $table->timestamps();
            //FK
            $table->foreignId('restaurant_category_id')->nullable(false)->references('id')->on('restaurant_categories')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
