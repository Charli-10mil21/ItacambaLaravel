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
        Schema::create('explotaciones', function (Blueprint $table) {
            $table->id();
            $table->string('volumen');
            $table->string('tonelaje');
            $table->date('fecha')->nullable();
            $table->string('taladros');
            $table->unsignedBigInteger('topografia_id')->nullable();

            $table->foreign('topografia_id')
                    ->references('id')->on('topografias')
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
        Schema::dropIfExists('explotaciones');
    }
};
