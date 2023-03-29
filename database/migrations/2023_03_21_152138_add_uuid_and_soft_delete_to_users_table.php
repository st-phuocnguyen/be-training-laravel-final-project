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
            $table->dropColumn('id');
            $table->uuid('uuid')->primary();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void

    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropPrimary('uuid');
            $table->dropColumn('uuid');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->id();
            $table->dropSoftDeletes();
        });
    }
};
