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
        Schema::create('planificacions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('presupuesto');
            $table->string('produccion');
            $table->date('fechaIni');
            $table->date('fechaFin')->nullable();
            $table->string('duracion')->nullable();
            $table->unsignedBigInteger('user_id')->unique()->nullable();

            $table->foreign('user_id')
                    ->references('id')->on('users')
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
        Schema::dropIfExists('planificacions');
    }
};
