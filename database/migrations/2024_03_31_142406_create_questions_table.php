<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("quiz_id");
            $table->longText("question");
            $table->longText("image")->nullable();
            $table->longText("answerA");
            $table->longText("answerB");
            $table->longText("answerC");
            $table->longText("answerD");
            $table->longText("answerE");
            $table->enum("correct_answer", ['answerA', 'answerB', 'answerC', 'answerD','answerE']);
            $table->foreign("quiz_id")->references("id")->on("quizzes")->onDelete("cascade");
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
        Schema::dropIfExists('questions');
    }
}
