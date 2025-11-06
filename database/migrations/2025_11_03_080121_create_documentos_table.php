<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estagiario_id')->constrained('estagiarios')->onDelete('cascade');
            $table->string('tipo'); 
            $table->string('ficheiro'); 
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
