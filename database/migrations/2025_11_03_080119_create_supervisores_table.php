<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('supervisores', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('nome');
            $table->string('cargo');
            $table->string('area_formacao');
            $table->string('area_atuacao');
            $table->text('tarefas')->nullable();
            $table->foreignId('reparticao_id')->constrained('reparticoes')->onDelete('cascade');
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('supervisores');
    }
};
