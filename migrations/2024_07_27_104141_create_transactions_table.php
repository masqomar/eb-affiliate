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
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
			$table->uuid('exam_id')->nullable()->default('9b74ecfd-e300-4a13-b3f1-71968buj87ty');
			$table->string('code', 255);
			$table->tinyInteger('voucher_activated');
			$table->tinyInteger('voucher_used');
			$table->double('total_purchases');
			$table->dateTime('maximum_payment_time');
			$table->enum('transaction_status', ['pending', 'paid', 'failed', 'done']);
			$table->string('voucher_token', 255)->nullable();
			$table->string('invoice', 255)->nullable();
			$table->uuid('program_id')->nullable();
			$table->foreignId('period_id')->nullable();
			$table->string('snap_token', 255)->nullable();
			$table->date('program_date')->nullable();
			$table->time('program_time')->nullable();
			$table->longText('note', 255)->nullable();
			$table->integer('discount')->nullable();
			$table->integer('admin_fee')->nullable();
			$table->integer('down_payment')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('exam_id')
            ->references('id')
            ->on('exams')
            ->onDelete('cascade')
            ->onUpdate('cascade');

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
        Schema::dropIfExists('transactions');
    }
};
