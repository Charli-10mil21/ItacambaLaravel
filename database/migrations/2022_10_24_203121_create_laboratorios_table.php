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
            $table->string('fecha');
            $table->string('mg');
            $table->string('fe');
            $table->string('si');
            $table->string('al');
            $table->string('ca');
            $table->string('destino');
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
