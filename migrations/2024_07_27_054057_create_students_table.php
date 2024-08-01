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
        Schema::create('students', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
			$table->bigInteger('province_id')->nullable();
			$table->bigInteger('city_id')->nullable();
			$table->bigInteger('district_id')->nullable();
			$table->bigInteger('village_id')->nullable();
			$table->text('address', 255)->nullable();
			$table->string('phone_number', 255);
			$table->enum('gender', ['F', 'M']);
			$table->tinyInteger('is_member');
			$table->longText('member_access', 255);
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
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
