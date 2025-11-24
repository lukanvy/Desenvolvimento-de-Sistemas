@extends('layouts.app')

@section('title', 'Detalhes do Estagiário')
@section('page-title', 'Detalhes do Estagiário')
@section('page-subtitle', 'Visualize as informações completas do estagiário')
@section('content')
 <!-- Logotipo e título fora do quadrado -->
 <x-logo-tipo/>
    
<div class="container-fluid">
    <div class="form-container bg-white rounded-xl shadow-md p-6 max-w-4xl mx-auto">
        <h3 class="form-title mb-4">{{ $estagiario->nome_completo }}</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div><strong>Curso:</strong> {{ $estagiario->curso }}</div>
            <div><strong>Ano:</strong> {{ $estagiario->ano }}</div>
            <div><strong>Bilhete de Identidade:</strong> {{ $estagiario->bi }}</div>
            <div><strong>Email:</strong> <a href="mailto:{{ $estagiario->email }}" class="text-blue-600">{{ $estagiario->email }}</a></div>
            <div><strong>Telefone:</strong> {{ $estagiario->telefone }}</div>
            <div><strong>Supervisor:</strong> {{ $estagiario->supervisor->nome ?? 'Não definido' }}</div>
             <div><strong>Data de Inicio:</strong> {{ $estagiario->data_fim}}</div>
            <div><strong>Data de Fim:</strong> {{ $estagiario->data_inicio}}</div>
            <div><strong>Alocação:</strong> {{ $estagiario->departamento_id }}</div>
            <div><strong>Observaçoes:</strong> {{ $estagiario->observacoes }}</div>
           
            <div><strong>Status:</strong> {{ $estagiario->status }}</div>
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('estagiario.edit', $estagiario->id) }}" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500 flex items-center gap-1">
                <i class="bi bi-pencil"></i> Editar
            </a>
            <a href="{{ route('estagiario.index') }}" class="bg-gray-300 text-gray-800 px-3 py-1 rounded hover:bg-gray-400 flex items-center gap-1">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
        </div>
    </div>
</div>
@endsection
