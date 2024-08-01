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
        Schema::create('question_titles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('category_id');
			$table->string('name', 255);
			$table->integer('total_choices');
			$table->integer('total_section');
			$table->tinyInteger('add_value_category');
			$table->tinyInteger('assessment_type');
			$table->tinyInteger('show_answer');
			$table->double('minimum_grade')->nullable();
            $table->timestamps();

            $table->foreign('category_id')
            ->references('id')
            ->on('categories')
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
        Schema::dropIfExists('question_titles');
    }
};
