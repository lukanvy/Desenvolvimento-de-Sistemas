<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('departamentos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('nome');
            $table->string('abreviatura')->nullable();
            $table->string('descricao')->nullable();
            $table->string('email')->nullable()->unique();
            $table->timestamps();
        });
    }

  
    public function down(): void
    {
        Schema::dropIfExists('departamentos');
    }
};
