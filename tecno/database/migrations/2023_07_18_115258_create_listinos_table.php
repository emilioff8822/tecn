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
    Schema::create('listinos', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('id_servizio');
        $table->unsignedBigInteger('id_point');
        $table->decimal('costo', 10, 2);
        $table->decimal('prezzo_vendita', 10, 2);
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
        Schema::dropIfExists('listinos');
    }
};