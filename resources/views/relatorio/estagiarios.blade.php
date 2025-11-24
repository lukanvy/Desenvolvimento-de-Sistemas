@extends('layouts.app')

@section('title', 'Relatório de Estagiários')
@section('page-title', 'Relatório de Estagiários')
@section('page-subtitle', 'Filtre e visualize estagiários por critérios específicos')

@section('content')
<div class="container-fluid">

    <!-- Logo e Cabeçalho -->
    <x-logo-tipo/>
    <div class="form-container">
        <div class="form-header">
            <div class="form-icon">
                <i class="bi bi-file-earmark-bar-graph-fill"></i>
            </div>
            <div>
                <p class="form-subtitle">Selecione filtros para gerar o relatório</p>
            </div>
        </div>
        <form method="GET" class="mb-4">
    <div class="row g-3 align-items-end">
        <!-- Ano -->
        <div class="col-md-2">
            <label class="form-label">Ano</label>
            <select name="ano" class="form-select">
                <option value="">-- Todos --</option>
                @for($i = date('Y'); $i >= 2020; $i--)
                    <option value="{{ $i }}" {{ request('ano') == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>

        <!-- Departamento -->
        <div class="col-md-3">
            <label class="form-label">Departamento</label>
            <select name="departamento_id" class="form-select">
                <option value="">Todos </option>
                @foreach($departamentos as $d)
                    <option value="{{ $d->id }}" {{ request('departamento_id') == $d->id ? 'selected' : '' }}>
                        {{ $d->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Supervisor -->
        <div class="col-md-3">
            <label class="form-label">Supervisor</label>
            <select name="supervisor_id" class="form-select">
                <option value="">Todos</option>
                @foreach($supervisores as $s)
                    <option value="{{ $s->id }}" {{ request('supervisor_id') == $s->id ? 'selected' : '' }}>
                        {{ $s->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Botão de pesquisa -->
        <div class="col-md-2 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100">
                <i class="bi bi-search"></i> Pesquisar
            </button>
        </div>
    </div>
</form>

    <!-- Tabela Resultados -->
    <div class="table-responsive">
        <table class="table table-hover table-striped align-middle">
            <thead style="background-color: #343a40; color: white;">
                <tr>
                    <th>Nome</th>

                    <th>Curso</th>

                    <th>Ano</th>
                    <th>Departamento</th>
                    <th>Supervisor</th>
                </tr>
            </thead>
            <tbody>
                @forelse($estagiarios as $e)
                <tr>
                    <td class="px-4 py-2">{{ $e->nome_completo }}</td>
                    <td class="px-4 py-2">{{ $e->curso}}</td>
                    <td class="px-4 py-2">{{ $e->ano }}</td>
                    <td class="px-4 py-2">{{ $e->departamento_id->nome ?? '-'}}</td>
                    <td class="px-4 py-2">{{ $e->supervisor->nome ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">
                        Nenhum resultado encontrado
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

    <!-- Paginação -->
    @if($estagiarios instanceof \Illuminate\Pagination\LengthAwarePaginator && $estagiarios->hasPages())
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div class="text-muted">
                Mostrando {{ $estagiarios->firstItem() }} a {{ $estagiarios->lastItem() }} de {{ $estagiarios->total() }} registros
            </div>
            <nav>{{ $estagiarios->links() }}</nav>
        </div>
    @endif

</div>
@endsection
