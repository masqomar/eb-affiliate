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
        Schema::table('transactions', function (Blueprint $table) {
            $table->string('invoice', 255)->nullable();
			$table->uuid('program_id')->nullable();
			$table->string('snap_token', 255)->nullable();
			$table->date('program_date')->nullable();
			$table->time('program_time')->nullable();
			$table->longText('note', 255)->nullable();
			$table->integer('discount')->nullable();
			$table->integer('admin_fee')->nullable();
			$table->integer('down_payment')->nullable();

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
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('invoice');
            $table->dropColumn('program_id');
            $table->dropColumn('snap_token');
            $table->dropColumn('program_date');
            $table->dropColumn('program_time');
            $table->dropColumn('note');
            $table->dropColumn('discount');
            $table->dropColumn('admin_fee');
            $table->dropColumn('down_payment');
        });
    }
};
