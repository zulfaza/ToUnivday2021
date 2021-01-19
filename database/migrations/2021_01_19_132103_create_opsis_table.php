<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpsisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opsis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('soal_id');
            $table->text('body');
            $table->string('tipe');
            $table->timestamps();

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
        Schema::dropIfExists('opsis');
    }
}
