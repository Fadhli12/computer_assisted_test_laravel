<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->unsignedInteger('section_ammount')->default(1);
            $table->unsignedInteger('question_ammount_per_section')->default(1);
            $table->unsignedInteger('duration_per_section')->default(1);
            $table->boolean('is_skippable')->default(0);
            $table->unsignedBigInteger('user_created')->nullable();
            $table->unsignedBigInteger('user_updated')->nullable();
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
        Schema::dropIfExists('question_groups');
    }
}
