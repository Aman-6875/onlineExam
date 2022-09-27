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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('question_bank_id')->nullable();
            $table->enum('type', ['per_question_wise', 'full_exam']);
            $table->integer('time_limit');
            $table->boolean('is_negative_on')->default(false);
            $table->decimal('negative_number',5,2)->nullable();
            $table->boolean('is_customizable')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams');
    }
};
