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
        Schema::create('muestras', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->unsignedBigInteger('perforacion_id')->nullable();
            $table->unsignedBigInteger('poligono_id')->nullable();

            $table->foreign('perforacion_id')
                    ->references('id')->on('perforaciones')
                    ->onDelete('set null');
            $table->foreign('poligono_id')
                    ->references('id')->on('poligonos')
                    ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('muestras');
    }
};
