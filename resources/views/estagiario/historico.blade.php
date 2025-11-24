@extends('layouts.app')

@section('content')

<x-logo-tipo/>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>📜 Histórico de Estagiários Encerrados</h3>
        <a href="{{ route('estagiario.index') }}" class="btn btn-secondary">⬅️ Voltar</a>
    </div>

    @if ($estagiarios->isEmpty())
        <div class="alert alert-info">Nenhum estágio encerrado até o momento.</div>
    @else
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Nome Completo</th>
                    <th>Curso</th>
                    <th>Ano</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Supervisor</th>
                    <th>Alocação</th>
                    <th>Data de Início</th>
                    <th>Data de Fim</th>
                    <th>Carta</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($estagiarios as $estagiario)
                    <tr>
                        <td>{{ $estagiario->nome_completo }}</td>
                        <td>{{ $estagiario->curso }}</td>
                        <td>{{ $estagiario->ano }}</td>
                        <td>{{ $estagiario->email }}</td>
                        <td>{{ $estagiario->telefone }}</td>
                        <td>{{ $estagiario->supervisor }}</td>
                        <td>{{ $estagiario->alocacao }}</td>
                        <td>{{ \Carbon\Carbon::parse($estagiario->data_inicio)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($estagiario->data_fim)->format('d/m/Y') }}</td>
                        <td>
                            @if ($estagiario->carta)
                                <a href="{{ asset('storage/' . $estagiario->carta) }}" target="_blank" class="btn btn-sm btn-outline-primary">📎 Ver Carta</a>
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection@extends('layouts.app')

@section('title', 'Histórico do Estagiário')
@section('page-title', 'Histórico do Estagiário')
@section('page-subtitle', 'Registros de atividades e alterações do estagiário')

@section('content')
<div class="container-fluid">
    <div class="form-container bg-white rounded-xl shadow-md p-6 max-w-5xl mx-auto">
        <h3 class="form-title mb-4">Histórico de {{ $estagiario->nome_completo }}</h3>

        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Data</th>
                        <th>Ação</th>
                        <th>Usuário</th>
                        <th>Observações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($historicos as $h)
                    <tr>
                        <td>{{ $h->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $h->acao }}</td>
                        <td>{{ $h->usuario->name ?? 'Sistema' }}</td>
                        <td>{{ $h->observacoes }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-3">Nenhum histórico encontrado</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="flex justify-end mt-4">
            <a href="{{ route('estagiario.show', $estagiario->id) }}" class="bg-gray-300 text-gray-800 px-3 py-1 rounded hover:bg-gray-400 flex items-center gap-1">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
        </div>
    </div>
</div>
@endsection
