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
        Schema::create('period_program', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('period_id');
            $table->uuid('program_id');
            $table->timestamps();

            $table->foreign('program_id')
            ->references('id')
            ->on('programs')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('period_program');
    }
};
