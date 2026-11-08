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
        // Table connecting category and brands 
        Schema::create('category_brands', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')
                ->constrained(
                    table: 'categories',
                    column: 'id'
                )
                ->cascadeOnDelete();

            $table->foreignId('brand_id')
                ->constrained(
                    table: 'brands',
                    column: 'id'
                )
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_brands');
    }
};
