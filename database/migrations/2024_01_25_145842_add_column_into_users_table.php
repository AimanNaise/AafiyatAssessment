<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Define a new class for the migration
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add new columns to the 'users' table
        Schema::table('users', function (Blueprint $table) {
            $table->string('gender')->after('email')->nullable();
            $table->date('birthday')->after('gender')->nullable();
            $table->boolean('is_active')->after('birthday')->nullable();
            $table->softDeletes(); // Add soft delete column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Reverse the changes made in the 'up' method
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_active');
            $table->dropColumn('birthday');
            $table->dropColumn('gender');
            $table->dropColumn('deleted_at'); // Correct the column name
        });
    }
};
