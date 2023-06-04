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
            $table->unsignedBigInteger('blending_id')->nullable();
            $table->integer('T_viajes')->nullable();
            $table->time('T_horas')->nullable();
            $table->time('H_efectivas')->nullable();
            $table->integer('T_produccion')->nullable();
            $table->integer('productividad')->nullable();
            $table->integer('T_balanza')->nullable();

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
        Schema::dropIfExists('producciones');
    }
};
