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
        Schema::create('viajes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('panele_id')->nullable();
            $table->unsignedBigInteger('volqueta_id')->nullable();
            $table->string('nivel');
            $table->string('voladura');
            $table->integer('n_viajes')->nullable();

            $table->foreign('panele_id')
                    ->references('id')->on('paneles')
                    ->onDelete('set null');

            $table->foreign('volqueta_id')
                    ->references('id')->on('volquetas')
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
        Schema::dropIfExists('viajes');
    }
};
