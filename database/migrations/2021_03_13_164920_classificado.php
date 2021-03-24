<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Classificado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Classificados', function (Blueprint $table) {
            $table->id();
            $table->string('Titulo');
            $table->string('Descricao');
            $table->float('Preco');
            $table->foreignId('LocalID');
            $table->integer("Status");
     
        });


        Schema::create('Categorias', function (Blueprint $table) {
            $table->id();
            $table->string('Titulo');
            $table->string('Descricao');
            $table->float('Preco');          
      
        });


        Schema::create('Album', function (Blueprint $table) {
            $table->id();
            $table->string('Titulo');
            $table->string('Descricao');
            $table->foreign('Id')->references('Id')->on('Classificados');
        
        });

        Schema::create('Tags', function (Blueprint $table) {
            $table->id();
         
            $table->string('Nome');
        
        });

        Schema::create('Local', function (Blueprint $table) {
            $table->id();            
            $table->string('Nome');
            $table->string('Cep');
         
        });

        Schema::create('Artigos', function (Blueprint $table) {
            $table->id();          
            $table->string('Nome');
            $table->string('Descricao');
            $table->integer('status');
           
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();          
            $table->string('nome');
            $table->string('email')->unique();
            $table->integer('cpf')->unique();
         
            $table->integer('password');
         
        });

        Schema::create('dados', function (Blueprint $table) {
            $table->id();          
            $table->string('nome');            
            $table->integer('telefone');
            $table->date('dataNascimento');
            $table->integer('id_usuario');
          
        });

        Schema::create('walllikes', function (Blueprint $table) {
            $table->id();          
            $table->integer('id_wall');            
            $table->integer('telefone');
       
        });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('classificados');
        Schema::drop('Categorias');
        Schema::drop('Album');
        Schema::drop('Tags');
        Schema::drop('Local');
        Schema::drop('users');
        Schema::drop('dados');
        Schema::drop('walllikes');
    }
}








