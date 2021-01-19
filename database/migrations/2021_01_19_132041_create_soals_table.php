<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soals', function (Blueprint $table) {
            $table->id();
            $table->integer('no');
            $table->foreignId('paket_id');
            $table->foreignId('jenis_id');
            $table->text('body');
            $table->string('answer');
            $table->timestamps();

            $table->foreign('paket_id')->references('id')->on('pakets');
            $table->foreign('jenis_id')->references('id')->on('jenis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soals');
    }
}
