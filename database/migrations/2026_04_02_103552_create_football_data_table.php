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
        Schema::create('football_data', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->unsignedInteger('league');
            $table->unsignedInteger('season');
            $table->jsonb('payload');
            $table->timestamps();

            $table->unique(['type', 'league', 'season']);
            $table->index(['league', 'season']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('football_data');
    }
};
