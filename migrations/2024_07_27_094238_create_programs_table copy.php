<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 255);
			$table->integer('price');
			$table->string('image')->nullable();
			$table->tinyInteger('is_active')->nullable()->default('1');
			$table->foreignId('period_id')->constrained('periods')->cascadeOnUpdate()->cascadeOnDelete();
			$table->uuid('program_type_id');
            $table->timestamps();
            
            $table->foreign('program_type_id')
            ->references('id')
            ->on('program_types')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
};
