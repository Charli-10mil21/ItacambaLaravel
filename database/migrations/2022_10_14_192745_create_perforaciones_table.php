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
        Schema::create('perforaciones', function (Blueprint $table) {
            $table->id();
            $table->string('numero');
            $table->string('coordenadas');
            $table->string('profundidad');
            $table->unsignedBigInteger('poligono_id')->nullable();

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
        Schema::dropIfExists('perforaciones');
    }
};
