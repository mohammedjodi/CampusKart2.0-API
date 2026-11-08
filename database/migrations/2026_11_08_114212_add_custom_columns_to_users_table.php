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
        // Add Custom fields to users table...
        Schema::table('users', function (Blueprint $table) {
        $table->renameColumn('name', 'first_name');

        $table->string('last_name', 100)->after('first_name');
        $table->string('username', 100)->unique()->after('last_name');
        $table->string('phone', 20)->after('username');

        $table->string('avatar')->nullable();
        $table->text('bio')->nullable();

        //FK refferencing universities.id 
        $table->foreignId('university_id')
            ->after('id')
            ->constrained(
                table: 'universities',
                column: 'id'
            )
            ->restrictOnDelete();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
        $table->dropForeign(['university_id']);
        $table->dropUnique(['username']);

        $table->dropColumn([
            'university_id',
            'last_name',
            'username',
            'phone',
            'avatar',
            'bio',
        ]);

        $table->renameColumn('first_name', 'name');
    });
    }
};
