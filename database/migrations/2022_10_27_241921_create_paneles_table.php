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
            $table->date('fecha');
            $table->string('nombre');
            $table->string('turno');
            $table->unsignedBigInteger('blending_id')->nullable();
            $table->string('HorasEfectivas')->nullable();
            $table->unsignedBigInteger('topografia_id')->nullable();
            $table->string('N_volquetas');
            $table->string('N_viajes')->nullable();
            $table->string('toneladas_total')->nullable();
            $table->string('balanza')->nullable();
            $table->unsignedBigInteger('produccione_id')->nullable();

             $table->foreign('blending_id')
                    ->references('id')->on('blendings')
                    ->onDelete('set null');
            $table->foreign('topografia_id')
                    ->references('id')->on('topografias')
                    ->onDelete('set null');
            $table->foreign('produccione_id')
                    ->references('id')->on('producciones')
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
