<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
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
            $table->foreignId('user_id');
            $table->foreignId('progress_id');
            $table->foreignId('soal_id');
            $table->integer('no');
            $table->char('value', 1)->nullable();
            $table->integer('tipe')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('progress_id')->references('id')->on('progress');
            $table->foreign('soal_id')->references('id')->on('soals');
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
}
