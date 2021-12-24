<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->constrained('rooms');
            $table->string('key');
            $table->string('type');
            $table->integer('limit_access')->nullable();
            $table->dateTime('valid_until')->nullable();
            $table->integer('access_counter')->default(0);
            $table->boolean('is_active')->default(0);
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
        Schema::dropIfExists('access_rooms');
    }
}
