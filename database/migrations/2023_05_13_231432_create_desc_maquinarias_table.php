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
        Schema::create('desc_maquinarias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('panele_id')->nullable();
            $table->unsignedBigInteger('maquinaria_id')->nullable();
            $table->time('horaUso')->nullable();

            $table->foreign('panele_id')
                    ->references('id')->on('paneles')
                    ->onDelete('set null');
            $table->foreign('maquinaria_id')
                    ->references('id')->on('maquinarias')
                    ->onDelete('set null');
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
        Schema::dropIfExists('desc_maquinarias');
    }
};
