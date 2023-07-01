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
        Schema::create('blendings', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->date('fecha');
            $table->time('HoraIni');
            $table->string('estado');
            $table->decimal('FSC_total', 10, 2)->nullable();
            $table->decimal('MS_total', 10, 2)->nullable();
            $table->decimal('MA_total', 10, 2)->nullable();
            $table->integer('toneladas_total')->nullable();
            $table->integer('viajes_total')->nullable();
            $table->unsignedBigInteger('materia_id')->nullable();
            $table->unsignedBigInteger('planificacion_id')->nullable();
            $table->string('Observaciones')->nullable();


            $table->foreign('materia_id')
                    ->references('id')->on('materias')
                    ->onDelete('set null');
            $table->foreign('planificacion_id')
                    ->references('id')->on('planificacions')
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
        Schema::dropIfExists('blendings');
    }
};
