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
        Schema::create('grades', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('category_id');
			$table->uuid('exam_id');
			$table->uuid('user_id');
			$table->integer('duration');
			$table->integer('number');
			$table->integer('section');
			$table->integer('total_section');
			$table->dateTime('start_time')->nullable();
			$table->dateTime('end_time')->nullable();
			$table->integer('total_correct');
			$table->decimal('grade_old');
			$table->decimal('grade');
			$table->longText('answers', 255)->nullable();
			$table->integer('is_finished');
			$table->integer('total_tolerance');
			$table->tinyInteger('is_blocked');
            $table->timestamps();

            $table->foreign('category_id')
            ->references('id')
            ->on('categories')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('exam_id')
            ->references('id')
            ->on('exams')
            ->onDelete('cascade')
            ->onUpdate('cascade');

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
        Schema::dropIfExists('grades');
    }
};
