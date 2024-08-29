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
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->uuid('user_id');
            $table->string('subdomain')->unique();
            $table->string('subdomain_link')->unique();
            $table->string('phone_number')->unique();
            $table->string('account_bank');
            $table->string('account_number');            
            $table->string('account_name');
            $table->longText('address');
            $table->tinyInteger('snk');            
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
