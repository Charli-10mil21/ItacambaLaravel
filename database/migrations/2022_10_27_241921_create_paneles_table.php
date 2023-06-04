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
        Schema::create('paneles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('turno_id')->nullable();
            $table->unsignedBigInteger('produccione_id')->nullable();
            $table->time('HoraIni')->nullable();
            $table->time('HoraFin')->nullable();
            $table->time('HorasT')->nullable();
            $table->time('HorasEfectivas')->nullable();
            $table->string('N_volquetas')->nullable();
            $table->integer('N_viajes')->nullable();
            $table->string('toneladas_total')->nullable();
            $table->string('balanza')->nullable();
           
            

            $table->foreign('produccione_id')
                    ->references('id')->on('producciones')
                    ->onDelete('set null');

            $table->foreign('turno_id')
                    ->references('id')->on('turnos')
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
        Schema::dropIfExists('paneles');
    }
};
