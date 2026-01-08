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
            if (!Schema::hasColumn('users', 'water_goal')) {
                $table->integer('water_goal')->default(2000);
            }

            if (!Schema::hasColumn('users', 'activity_goal')) {
                $table->integer('activity_goal')->default(45);
            }

            if (!Schema::hasColumn('users', 'sleep_goal')) {
                $table->decimal('sleep_goal', 3, 1)->default(8.0);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['water_goal', 'activity_goal', 'sleep_goal']);
        });
    }
};
