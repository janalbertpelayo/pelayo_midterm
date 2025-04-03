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
            $table->id(); // Auto-incrementing ID, primary key
            $table->string('name'); // String, required
            $table->integer('qty'); // Integer, required
            $table->decimal('price', 10, 2); // Decimal, required
            $table->text('description'); // Text, required
            $table->timestamps('created_at'); // Timestamps for creation
            $table->timestamps('updated_at'); // Timestamps for last update
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
