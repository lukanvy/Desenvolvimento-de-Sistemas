@extends('layouts.app')

@section('title', 'Adicionar de Documentos')
@section('page-title', 'Adicionar de Documentos')
@section('page-subtitle', 'Gerencie os documentos cadastrados')

@section('content')
<div class="container-fluid">
    <!-- Cabeçalho -->
   <x-logo-tipo/>
    <div class="form-container">
        <div class="form-header">
            <div class="form-icon">
               <i class="bi bi-people-fill"></i>
            </div>
            <div>
                <p class="form-subtitle">Adicionar Documentos</p>
            </div>
        </div>

<div class="card mt-4">
    <div class="card-header bg-primary text-white">
        Enviar Novo Documento
    </div>

    <div class="card-body">
        <form action="{{ route('documento.store', $estagiario->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Tipo do Documento</label>
                <select name="tipo" class="form-control" required>
                    <option value="termo_compromisso">Termo de Compromisso</option>
                    <option value="plano_estagio">Plano de Estágio</option>
                    <option value="certificado">Certificado</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Selecione o ficheiro</label>
                <input type="file" name="documento" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Carregar</button>
        </form>
    </div>
</div>
