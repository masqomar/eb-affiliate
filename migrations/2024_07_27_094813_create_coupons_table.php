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
        Schema::create('coupons', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('code', 255);
			$table->integer('amount');
			$table->integer('qty')->nullable();
			$table->uuid('program_id')->nullable();
			$table->date('start_date')->nullable();
			$table->date('end_date')->nullable();
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
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
};
