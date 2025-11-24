@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center min-h-screen bg-gray-50 p-6">

    <!-- Logotipo e título fora do quadrado -->
   <x-logo-tipo/>
    <!-- Card principal quadrado maior -->
    <div class="bg-white rounded-xl shadow-lg w-full max-w-4xl flex flex-col p-6">

        <!-- Informações do Supervisor -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">

            <div><strong>Código:</strong> {{ $supervisor->codigo }}</div>
            <div><strong>Nome:</strong> {{ $supervisor->nome }}</div>
            <div><strong>Cargo:</strong> {{ $supervisor->cargo }}</div>
            <div><strong>Repartição:</strong> {{ $supervisor->reparticao->nome ?? 'Não definida' }}</div>
            <div><strong>Área de Formação:</strong> {{ $supervisor->area_formacao }}</div>
            <div><strong>Área de Atuação:</strong> {{ $supervisor->area_atuacao }}</div>
            <div class="md:col-span-2">
                <strong>Tarefas:</strong>
                <p class="text-gray-600">{{ $supervisor->tarefas }}</p>
            </div>

        </div>

        <!-- Botões Voltar e Editar -->
        <div class="flex justify-center gap-4 mt-4">
            <a href="{{ route('supervisor.index') }}" 
               class="flex items-center gap-1 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-sm">
                <i class="bi bi-arrow-left-circle"></i> Voltar
            </a>

            <a href="{{ route('supervisor.edit', $supervisor->id) }}" 
               class="flex items-center gap-1 bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded text-sm">
                <i class="bi bi-pencil"></i> Editar
            </a>
        </div>

    </div>
</div>
@endsection
