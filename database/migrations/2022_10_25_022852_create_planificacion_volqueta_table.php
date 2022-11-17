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
        Schema::create('planificacion_volqueta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('planificacion_id');
            $table->unsignedBigInteger('volqueta_id');

            $table->foreign('planificacion_id')->references('id')->on('planificacions')
                    ->onDelete('cascade');
            $table->foreign('volqueta_id')->references('id')->on('volquetas')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('planificacion_volqueta');
    }
};
