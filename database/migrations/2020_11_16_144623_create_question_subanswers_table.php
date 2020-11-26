<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionSubanswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_subanswers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('question_answer_id');
            $table->unsignedBigInteger('user_id');
            $table->text('subanswer');
            $table->timestamps();

            $table->foreign('question_answer_id')->references('id')->on('question_answers')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_subanswers');
    }
}
