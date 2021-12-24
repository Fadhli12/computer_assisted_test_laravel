<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participant_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('participant_id')->constrained('participants');
            $table->unsignedBigInteger('question_id');
            $table->string('answer');
            $table->string('right_answer')->nullable();
            $table->integer('answer_value')->default(0);
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
        Schema::dropIfExists('participant_answers');
    }
}
