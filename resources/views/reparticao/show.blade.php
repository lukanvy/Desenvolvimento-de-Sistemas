@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center min-h-screen bg-gray-50 p-6">

    <!-- Logotipo e título fora do quadrado -->
   <x-logo-tipo/>   

    <!-- Card principal quadrado maior -->
    <div class="bg-white rounded-xl shadow-lg w-full max-w-4xl flex flex-col p-6">

        <!-- Informações da Repartição -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">

            <div><strong>Código:</strong> {{ $reparticao->codigo }}</div>
            <div><strong>Nome:</strong> {{ $reparticao->nome }}</div>
            <div><strong>Abreviatura:</strong> {{ $reparticao->abreviatura }}</div>
            <div><strong>Departamento:</strong> {{ $reparticao->departamento->nome ?? 'Não definido' }}</div>
            <div class="md:col-span-2">
                <strong>Descrição:</strong>
                <p class="text-gray-600">{{ $reparticao->descricao }}</p>
            </div>

        </div>

        <!-- Botões Voltar e Editar -->
        <div class="flex justify-center gap-4 mt-4">
            <a href="{{ route('reparticao.index') }}" 
               class="flex items-center gap-1 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-sm">
                <i class="bi bi-arrow-left-circle"></i> Voltar
            </a>

            <a href="{{ route('reparticao.edit', $reparticao->id) }}" 
               class="flex items-center gap-1 bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded text-sm">
                <i class="bi bi-pencil"></i> Editar
            </a>
        </div>

    </div>
</div>
@endsection
