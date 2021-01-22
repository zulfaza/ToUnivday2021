<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sesi_id');
            $table->foreignId('user_id');
            $table->foreignId('paket_id')->nullable();
            $table->integer('status')->default(0);
            $table->integer('tipe')->default(0);
            $table->string('start_time')->nullable();
            $table->string('stop_time')->nullable();
            $table->timestamps();

            $table->foreign('paket_id')->references('id')->on('pakets');
            $table->foreign('sesi_id')->references('id')->on('sesis');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('progress');
    }
}
