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
            $table->decimal('SiO2',10,2)->nullable();
            $table->decimal('Al2O3',10,2)->nullable();
            $table->decimal('Fe2O3',10,2)->nullable();
            $table->decimal('CaO',10,2)->nullable();
            $table->decimal('MgO',10,2)->nullable();
            $table->decimal('Na2O',10,2)->nullable();
            $table->decimal('K2O',10,2)->nullable();
            $table->decimal('Cl',10,2)->nullable();
            $table->decimal('FSC',10,2)->nullable();
            $table->decimal('MS',10,2)->nullable();
            $table->decimal('MA',10,2)->nullable();
            $table->string('destino')->nullable();
            $table->unsignedBigInteger('muestra_id')->unique()->nullable();

            $table->foreign('muestra_id')
                    ->references('id')->on('muestras')
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
