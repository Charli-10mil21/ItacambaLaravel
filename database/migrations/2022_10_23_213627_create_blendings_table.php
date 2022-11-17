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
            $table->string('fsc');
            $table->string('ms');
            $table->string('ma');
            $table->integer('toneladas');
            $table->integer('viajes');
            $table->unsignedBigInteger('planificacion_id')->nullable();
            $table->unsignedBigInteger('topografia_id')->nullable();
            $table->unsignedBigInteger('poligono_id')->nullable();

             $table->foreign('planificacion_id')
                    ->references('id')->on('planificacions')
                    ->onDelete('set null');

            $table->foreign('topografia_id')
                    ->references('id')->on('topografias')
                    ->onDelete('set null');
            $table->foreign('poligono_id')
                    ->references('id')->on('poligonos')
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
