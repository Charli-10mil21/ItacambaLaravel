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
        Schema::create('actividades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('panele_id')->nullable();
            $table->unsignedBigInteger('parada_id')->nullable();
            $table->string('detalle');
            $table->time('horaIni');
            $table->time('horaFin')->nullable();
            $table->time('Duracion')->nullable();

            $table->foreign('panele_id')
                    ->references('id')->on('paneles')
                    ->onDelete('set null');
            $table->foreign('parada_id')
                    ->references('id')->on('paradas')
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
        Schema::dropIfExists('actividades');
    }
};
