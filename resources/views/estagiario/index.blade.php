@extends('layouts.app')

@section('title', 'Lista de Estagiários')
@section('page-title', 'Lista de Estagiários')
@section('page-subtitle', 'Gerencie os estagiários cadastrados')

@section('content')
<div class="container-fluid">
    <!-- Cabeçalho -->
  <x-logo-tipo/>    
    <!-- Card principal -->
    <div class="form-container">
        <div class="form-header">
            <div class="form-icon">
             <i class="bi bi-building"></i>
            </div>
            <div>
                <p class="form-subtitle">Todos os estagiários cadastrados no sistema</p>
            </div>
        </div>

        <!-- Botão novo estagiário (verde) -->
        <div class="container mb-9">
    <div class="flex justify-end">
        <a href="{{ route('estagiario.create') }}" 
           class="flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-full text-sm font-medium"
           title="Novo Supervisor">
            <i class="bi bi-person-plus"></i>
            Novo Estagiario
        </a>
    </div>

        <!-- Mensagens de sucesso -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Tabela -->
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle">
                <thead style="background-color: #343a40; color: white;">
                    <tr>
                        <th class="ps-4">Nome Completo</th>
                        <th>Curso</th>
                        <th>Ano</th>
                        <th>Email</th>
                      <!--  <th>Alocação</th>-->
                        <th>Status</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($estagiarios as $e)
                    <tr class="hover:bg-gray-100">
                        <td class="px-4 py-2">{{ $e->nome_completo }}</td>
                        <td class="px-4 py-2">{{ $e->curso }}</td>
                        <td class="px-4 py-2">{{ $e->ano }}</td>
                        <td class="px-4 py-2">
                            <a href="mailto:{{ $e->email }}" class="text-blue-600 hover:underline">
                                {{ $e->email }}
                            </a>
                        </td>
                        <!-- <td class="px-4 py-2">{{ $e->alocacao }}</td>-->
                        <td class="px-4 py-2">
                            @php
                                $statusClass = match($e->status) {
                                    'Ativo' => 'bg-green-500',
                                    'Inativo' => 'bg-red-500',
                                    'Concluído' => 'bg-blue-500',
                                    default => 'bg-gray-400',
                                };
                            @endphp
                            <span class="text-white text-xs font-semibold px-3 py-1 rounded-full {{ $statusClass }}">
                                {{ $e->status }}
                            </span>
                        </td>

                        <td class="px-4 py-2 flex justify-center gap-1">
                            <!-- Ver -->
                            <a href="{{ route('estagiario.show', $e->id) }}" 
                            class="flex items-center gap-1 bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full text-sm font-semibold"
                            title="Ver detalhes">
                                <i class="bi bi-eye"></i>
                            </a>

                            <!-- Editar -->
                            <a href="{{ route('estagiario.edit', $e->id) }}" 
                            class="flex items-center gap-1 bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded-full text-sm font-medium"
                            title="Editar">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <!-- Apagar -->
                            <form action="{{ route('estagiario.destroy', $e->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="flex items-center gap-1 bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded-full text-sm font-medium"
                                        title="Apagar"
                                        onclick="return confirm('Tem certeza que deseja apagar este estagiário?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center text-gray-500 py-4">
                            <i class="bi bi-inbox display-6 d-block mb-2"></i>
                            Nenhum estagiário cadastrado
                        </td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

        <!-- Paginação -->
        @if($estagiarios instanceof \Illuminate\Pagination\LengthAwarePaginator && $estagiarios->hasPages())
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div class="text-muted">
                @if($estagiarios->total() > 0)
                    Mostrando {{ $estagiarios->firstItem() }} a {{ $estagiarios->lastItem() }} de {{ $estagiarios->total() }} registos
                @else
                    Nenhum registo encontrado
                @endif
            </div>
            <nav>
                {{ $estagiarios->links() }}
            </nav>
        </div>
        @endif
    </div>
</div>

<!-- Script para linhas clicáveis -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.clickable-row').forEach(function (row) {
        row.addEventListener('click', function (e) {
            if (e.target.closest('.action-cell') || e.target.tagName === 'A' || e.target.tagName === 'BUTTON' || e.target.closest('form')) return;
            window.location.href = this.dataset.href;
        });
        row.addEventListener('mouseenter', function () { if (!this.classList.contains('table-active')) this.style.backgroundColor = '#f8f9fa'; });
        row.addEventListener('mouseleave', function () { if (!this.classList.contains('table-active')) this.style.backgroundColor = ''; });
    });
});
</script>

<style>
.btn-submit.btn-success {
    background-color: #28a745;
    color: white;
    border-radius: 0.5rem;
    padding: 0.5rem 1rem;
    text-decoration: none;
    transition: background-color 0.2s ease;
}
.btn-submit.btn-success:hover {
    background-color: #218838;
    color: white;
}

.table th { border-top: none; font-weight: 600; font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.5px; }
.table td { vertical-align: middle; }
.badge { font-size: 0.75rem; padding: 0.35em 0.65em; }
.alert { border: none; border-radius: 0.75rem; }
.btn-group .btn { border-radius: 0.375rem !important; margin: 0 2px; }
.clickable-row { cursor: pointer; transition: background-color 0.15s ease-in-out; }
.clickable-row:hover { background-color: #f8f9fa !important; }
.action-cell { pointer-events: auto; }
</style>
@endsection
