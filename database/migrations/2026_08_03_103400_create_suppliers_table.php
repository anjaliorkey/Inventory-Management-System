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
       Schema::create('suppliers', function (Blueprint $table) {
            $table->id();

            $table->string('company_name');
            $table->string('supplier_name');
            $table->string('mobile', 15)->unique();
            $table->string('email')->nullable();
            $table->string('gst_no')->nullable();

            $table->text('address');
            $table->string('city');
            $table->string('state');
            $table->string('pincode', 10);

            $table->boolean('status')->default(1);

            $table->timestamps();
            $table->softDeletes();

            // Indexes
            $table->index('company_name');
            $table->index('supplier_name');
            $table->index('city');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
