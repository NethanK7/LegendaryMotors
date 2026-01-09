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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('model');
            $table->integer('year');
            $table->decimal('price', 12, 2);
            $table->string('category')->default('supercar'); // supercar, offroad, classic
            $table->string('status')->default('available'); // available, sold, reserved
            $table->string('image_url');
            $table->json('specs')->nullable(); // HP, 0-60, Top Speed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
