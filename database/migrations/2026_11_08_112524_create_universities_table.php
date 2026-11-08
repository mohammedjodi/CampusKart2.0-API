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
        Schema::create('universities', function (Blueprint $table) {
            $table->id();
            // Foriegn key for refferencing states.id 
             $table->foreignId('state_id')
                ->constrained(
                    table: 'states',
                    column: 'id'
                )
                ->restrictOnDelete();

            $table->string('name');
            $table->timestamps();

            $table->unique(['state_id', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universities');
    }
};
