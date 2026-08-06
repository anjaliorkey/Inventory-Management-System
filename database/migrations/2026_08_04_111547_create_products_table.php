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

            // Relationships
            $table->foreignId('category_id')
                  ->constrained()
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            $table->foreignId('supplier_id')
                  ->constrained()
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            // Product Details
            $table->string('name');
            $table->string('sku')->unique();
            $table->string('barcode')->nullable();

            // Pricing
            $table->decimal('purchase_price', 10, 2);
            $table->decimal('selling_price', 10, 2);

            // Stock
            $table->integer('quantity')->default(0);
            $table->string('unit')->nullable('pcs');

            // Image
            $table->string('image')->nullable();

            // Description
            $table->text('description')->nullable();

            // Status
            $table->boolean('status')->default(true);

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
