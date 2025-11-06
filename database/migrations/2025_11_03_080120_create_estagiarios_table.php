<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('estagiarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome_completo');
            $table->string('curso');
            $table->string('ano');
            $table->string('bi')->unique();
            $table->string('email')->nullable();
            $table->string('telefone')->nullable();
            $table->date('data_inicio')->nullable();
            $table->date('data_fim')->nullable();
            $table->text('observacoes')->nullable();
            $table->string('carta')->nullable(); // Caminho do anexo
            $table->string('status')->default('Activo');

            // 🔗 Relações (colocar nullable() ANTES de constrained())
            $table->foreignId('supervisor_id')
                  ->nullable()
                  ->constrained('supervisores')
                  ->onDelete('set null');

            $table->foreignId('departamento_id')
                  ->nullable()
                  ->constrained('departamentos')
                  ->onDelete('set null');

            $table->foreignId('reparticao_id')
                  ->nullable()
                  ->constrained('reparticoes')
                  ->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estagiarios');
    }
};
