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
        Schema::create('producciones', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('cinta');
            $table->string('T_viajes')->nullable();
            $table->string('T_horas')->nullable();
            $table->string('H_efectivas')->nullable();
            $table->string('T_produccion')->nullable();
            $table->string('productividad')->nullable();
            $table->string('T_balanza')->nullable();
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
        Schema::dropIfExists('producciones');
    }
};
