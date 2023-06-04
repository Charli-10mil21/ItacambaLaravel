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
        Schema::create('laboratorios', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('SiO2')->nullable();
            $table->string('Al2O3')->nullable();
            $table->string('Fe2O3')->nullable();
            $table->string('CaO')->nullable();
            $table->string('MgO')->nullable();
            $table->string('Na2O')->nullable();
            $table->string('K2O')->nullable();
            $table->string('Cl')->nullable();
            $table->string('FSC')->nullable();
            $table->string('MS')->nullable();
            $table->string('MA')->nullable();
            $table->string('destino')->nullable();
            $table->unsignedBigInteger('muestra_id')->unique()->nullable();
            $table->unsignedBigInteger('blending_id')->nullable();

            $table->foreign('muestra_id')
                    ->references('id')->on('muestras')
                    ->onDelete('set null');
            $table->foreign('blending_id')
                    ->references('id')->on('blendings')
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
        Schema::dropIfExists('laboratorios');
    }
};
