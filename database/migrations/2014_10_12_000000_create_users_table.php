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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('campo');
            $table->integer('telefono')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }

    // para cambiar una propiedad de se tiene que primero añadir el codigo composer require doctrine/dbal este ya se añadio a este proyecto, luego se tiene que crear una migracion para realizar los cambios ejemplo php artisan make:migrate cambiar_propiedades_to_users_table luego vas a la migracion y pones  $table->string('name', 50)->change(); para cambiar la propiedad y lo contrario en down para que veulva a ser como antes 
};
