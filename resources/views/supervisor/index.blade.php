@extends('layouts.app')

@section('title', 'Lista de Supervisores')
@section('page-title', 'Lista de Supervisores')
@section('page-subtitle', 'Gerencie os supervisores cadastrados')

@section('content')
<div class="container-fluid">
    <!-- Cabeçalho -->
 <x-logo-tipo/>

    <!-- Card principal -->
    <div class="form-container">
        <div class="form-header">
            <div class="form-icon">
                <i class="bi bi-person-badge-fill"></i>
            </div>
            <div>
                <p class="form-subtitle">Todos os supervisores cadastrados no sistema</p>
            </div>
        </div>

        <!-- Botão novo supervisor -->
    <!-- Container para o botão -->
<div class="container mb-9">
    <div class="flex justify-end">
        <a href="{{ route('supervisor.create') }}" 
           class="flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded-full text-sm font-medium"
           title="Novo Supervisor">
            <i class="bi bi-person-plus"></i>
            Novo Supervisor
        </a>
    </div>
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
                        <th>Nome</th>
                        <th>Cargo</th>
                        <th>Área de Formação</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($supervisores as $s)
                    <tr class="hover:bg-gray-100">
                        <td class="px-4 py-2">{{ $s->nome }}</td>
                        <td class="px-4 py-2">{{ $s->cargo }}</td>
                        <td class="px-4 py-2">{{ $s->area_formacao }}</td>
                        <td class="px-4 py-2">
                           <div class="flex justify-center space-x-2">
                            <!-- Ver -->
                            <a href="{{ route('supervisor.show', $s->id) }}" 
                               class="flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full text-sm font-medium"
                               title="Ver detalhes">
                                <i class="bi bi-eye"></i>
                            </a>

                            <!-- Editar -->
                            <a href="{{ route('supervisor.edit', $s->id) }}" 
                               class="flex items-center gap-1 bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded-full text-sm font-medium"
                               title="Editar">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <!-- Apagar -->
                            <form action="{{ route('supervisor.destroy', $s->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="flex items-center gap-1 bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded-full text-sm font-medium"
                                        title="Apagar"
                                        onclick="return confirm('Tem certeza que deseja apagar este supervisor?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-4 py-2 text-center">Nenhum supervisor encontrado.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginação -->
        @if($supervisores instanceof \Illuminate\Pagination\LengthAwarePaginator && $supervisores->hasPages())
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="text-muted">
                    @if($supervisores->total() > 0)
                        Mostrando {{ $supervisores->firstItem() }} a {{ $supervisores->lastItem() }} de {{ $supervisores->total() }} registos
                    @else
                        Nenhum registo encontrado
                    @endif
                </div>
                <nav>
                    {{ $supervisores->links() }}
                </nav>
            </div>
        @endif
    </div>
</div>

<style>
.table th {
    border-top: none;
    font-weight: 600;
    font-size: 0.875rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.table td {
    vertical-align: middle;
}

.badge {
    font-size: 0.75rem;
    padding: 0.35em 0.65em;
}

.alert {
    border: none;
    border-radius: 0.75rem;
}

.btn-group .btn {
    border-radius: 0.375rem !important;
    margin: 0 2px;
}

td.flex {
    min-width: 140px;
}

.form-container {
    max-width: 100%;
    margin: 0 auto;
}

.table th, .table td {
    white-space: nowrap;
}

.table-responsive {
    overflow-x: auto;
}

.btn-submit {
    background-color: #0d6efd;
    color: white;
    border-radius: 0.5rem;
    padding: 0.5rem 1rem;
    text-decoration: none;
    transition: background-color 0.2s ease;
}

.btn-submit:hover {
    background-color: #0b5ed7;
    color: white;
}
</style>
@endsection
