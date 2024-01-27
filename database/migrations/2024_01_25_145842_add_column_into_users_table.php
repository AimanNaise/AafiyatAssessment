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
            Schema::table('users', function (Blueprint $table) {
                $table->string('gender')->after('email')->nullable();
                $table->date('birthday')->after('gender')->nullable();
                $table->boolean('is_active')->after('birthday')->nullable();
                $table->softDeletes();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_active');
            $table->dropColumn('birthday');
            $table->dropColumn('gender');
            $table->dropColumn('delete_at');

        });
    }
};
