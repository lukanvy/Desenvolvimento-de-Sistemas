@extends('layouts.app')

@section('title', 'Lista de Documentos')
@section('page-title', 'Lista de Documentos')
@section('page-subtitle', 'Gerencie os documentos cadastrados')

@section('content')
<div class="container-fluid">
    <x-logo-tipo/>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-2">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

<div class="container mb-9">
    <div class="flex justify-end">
        <a href="{{ route('documento.create', 1) }}" class="flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-full text-sm font-medium"
           title="Novo Documento">
            <i class="bi bi-person-plus"></i> 
            Novo Documento
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-striped align-middle">
            <thead style="background-color: #343a40; color: white;">
                <tr>
                <th>Estagiário</th>
                <th>Tipo</th>
                <th>Documento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($documentos as $doc)
            <tr>
                <td>{{ $doc->estagiario->nome ?? 'Sem Estagiário' }}</td>
                <td>{{ $doc->tipo }}</td>
                <td>
                    <a href="{{ asset('storage/' . $doc->caminho) }}" target="_blank">
                        {{ $doc->nome_original }}
                    </a>
                </td>
                <td>
                    <form action="{{ route('documento.destroy', $doc) }}" method="POST" onsubmit="return confirm('Deseja realmente excluir?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                    class="inline-flex items-center gap-1 bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded-full text-sm font-medium"
                    title="Apagar"
                    onclick="return confirm('Tem certeza que deseja apagar este departamento?')">
                <i class="bi bi-trash"></i>
            </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
