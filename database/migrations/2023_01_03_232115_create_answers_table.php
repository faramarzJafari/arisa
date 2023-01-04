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
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('User_id');
            $table->foreign('User_id')->references('id')->on('Users')->onDelete('cascade');
            $table->string('test_question');
            $table->string('descriptive_question');
            $table->string('file');
            $table->string('location');
            $table->string('condition');
            $table->string('wind_kph');
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
        Schema::dropIfExists('answers');
    }
};
