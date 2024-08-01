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
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('transaction_id');
            $table->string('invoice');
            $table->string('tshirt_size');
            $table->integer('full_payment');
            $table->string('snap_token')->nullable();
            $table->enum('payment_status', ['pending', 'paid', 'failed', 'done'])->default('pending');
            $table->timestamps();

            $table->foreign('transaction_id')
            ->references('id')
            ->on('transactions')
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
        Schema::dropIfExists('transaction_details');
    }
};

