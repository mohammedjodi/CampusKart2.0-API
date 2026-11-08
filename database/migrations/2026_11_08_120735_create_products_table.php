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
        // Products table connecting our tables using FK
        Schema::create('products', function (Blueprint $table) {
            $table->id();

        $table->foreignId('user_id')
            ->constrained(
                table: 'users',
                column: 'id'
            )
            ->cascadeOnDelete();

        $table->foreignId('category_id')
            ->constrained(
                table: 'categories',
                column: 'id'
            )
            ->restrictOnDelete();

        $table->foreignId('brand_id')
            ->nullable()
            ->constrained(
                table: 'brands',
                column: 'id'
            )
            ->nullOnDelete();

        $table->foreignId('condition_id')
            ->constrained(
                table: 'conditions',
                column: 'id'
            )
            ->restrictOnDelete();

        $table->foreignId('status_id')
            ->constrained(
                table: 'product_statuses',
                column: 'id'
            )
            ->restrictOnDelete();

        $table->string('title', 255);
        $table->text('description');
        $table->decimal('price', 12, 2);

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
