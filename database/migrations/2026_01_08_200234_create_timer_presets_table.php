<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('timer_presets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->integer('duration_minutes');
            $table->string('icon')->default('hourglass-split'); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('timer_presets');
    }
};
