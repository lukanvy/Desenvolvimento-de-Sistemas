@extends('layouts.app')

@section('title', 'Adicionar Documento')
@section('page-title', 'Adicionar Documento')
@section('page-subtitle', 'Envie um novo documento para o estagiário')

@section('content')
<x-logo-tipo/>
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text bg-blue-500">
            Novo Documento - {{ $estagiario->nome }}
        </div>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('documento.store', $estagiario->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>Tipo do Documento</label>
                    <select name="tipo" class="form-control" required>
                        <option value="">Selecione...</option>
                        <option value="termo_compromisso">Termo de Compromisso</option>
                        <option value="plano_estagio">Plano de Estágio</option>
                        <option value="certificado">Certificado</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Selecione o ficheiro</label>
                    <input type="file" name="documento" class="form-control" required>
                </div>

                <!-- Botões centralizados -->
                <div class="flex justify-center gap-4 mt-4">
                    <button type="submit"  class="flex items-center gap-1 bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded text-sm">
                <i class="bi bi-arrow-left-circle"></i> Carregar
                 </button>  
                    <a href="{{ route('documento.index') }}" class="flex items-center gap-1 bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded text-sm">
                <i class="bi bi-arrow-left-circle"></i> Voltar
                    </a> 
                </div> 
            
            </form>

        </div>
    </div>
</div>
@endsection
