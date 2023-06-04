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
        Schema::create('desc_blendings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blending_id')->nullable();
            $table->unsignedBigInteger('topografia_id')->nullable();
            $table->unsignedBigInteger('poligono_id')->nullable();
            $table->unsignedBigInteger('laboratorio_id')->nullable();
            $table->integer('toneladas');
            $table->integer('viajes');

            $table->foreign('blending_id')
                    ->references('id')->on('blendings')
                    ->onDelete('set null');
            $table->foreign('topografia_id')
                    ->references('id')->on('topografias')
                    ->onDelete('set null');
            $table->foreign('poligono_id')
                    ->references('id')->on('poligonos')
                    ->onDelete('set null');
            $table->foreign('laboratorio_id')
                    ->references('id')->on('laboratorios')
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
        Schema::dropIfExists('desc_blendings');
    }
};
