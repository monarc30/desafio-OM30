<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('mae', 100);
            $table->date('data_nascimento');
            $table->string('cpf', 11)->unique();
            $table->string('cns', 15)->unique();            
            $table->string('file_path');
            $table->string('cep', 10);
            $table->string('endereco', 100);
            $table->integer('numero');            
            $table->string('complemento', 50);            
            $table->string('bairro', 70);            
            $table->string('cidade', 70);            
            $table->string('estado', 2);            
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
        Schema::dropIfExists('pacientes');
    }
}
