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
    Schema::create('venditas', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('id_servizio');
        $table->unsignedBigInteger('id_point');
        $table->dateTime('data_vendita');
        $table->timestamps();

        $table->foreign('id_servizio')->references('id')->on('servizis')->onDelete('cascade');
        $table->foreign('id_point')->references('id')->on('points')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venditas');
    }
};