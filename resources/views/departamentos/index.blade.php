@extends('layouts.app')

@section('title', 'Lista de Departamentos')
@section('page-title', 'Lista de Departamentos')
@section('page-subtitle', 'Gerencie os departamentos cadastrados')

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
                <p class="form-subtitle">Todos os departamentos cadastrados no sistema</p>
            </div>
        </div>

    <!-- Botão Novo Departamento -->
   <div class="container mb-9">
    <div class="flex justify-end">
        <a href="{{ route('departamentos.create') }}" 
           class="flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-full text-sm font-medium"
           title="Novo Supervisor">
            <i class="bi bi-person-plus"></i>
            Novo Departamento
        </a>
    </div>
</div>

    <!-- Mensagem de sucesso -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Tabela de Departamentos -->
    <div class="table-responsive">
        <table class="table table-hover table-striped align-middle">
            <thead style="background-color: #343a40; color: white;">
                <tr>
                    <th>Nome</th>
                    <th>Abreviatura</th>
                    <th>Email</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($departamentos as $d)
                <tr class="hover:bg-gray-100" data-href="{{ route('departamentos.show', $d->id) }}">
                    <td class="px-4 py-2">{{ $d->nome }}</td>
                    <td class="px-4 py-2">{{ $d->abreviatura }}</td>
                    <td class="px-4 py-2">{{ $d->email }}</td>
                    <td class="px-4 py-2 w-[180px] text-center">
    <div class="inline-flex items-center justify-center gap-1">
        <a href="{{ route('departamentos.show', $d->id) }}"  
           class="inline-flex items-center gap-1 bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-full text-sm font-medium"
           title="Ver detalhes">
            <i class="bi bi-eye"></i>
        </a>

        <a href="{{ route('departamentos.edit', $d->id) }}" 
           class="inline-flex items-center gap-1 bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded-full text-sm font-medium"
           title="Editar">
            <i class="bi bi-pencil"></i>
        </a>

        <form action="{{ route('departamentos.destroy', $d->id) }}" method="POST" class="inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" 
                    class="inline-flex items-center gap-1 bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded-full text-sm font-medium"
                    title="Apagar"
                    onclick="return confirm('Tem certeza que deseja apagar este departamento?')">
                <i class="bi bi-trash"></i>
            </button>
        </form>
    </div>
</td>

                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">
                        Nenhum departamento cadastrado
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginação -->
    @if($departamentos instanceof \Illuminate\Pagination\LengthAwarePaginator && $departamentos->hasPages())
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div class="text-muted">
                Mostrando {{ $departamentos->firstItem() }} a {{ $departamentos->lastItem() }} de {{ $departamentos->total() }} registros
            </div>
            <nav>{{ $departamentos->links() }}</nav>
        </div>
    @endif
</div>

<!-- Linhas clicáveis -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.clickable-row').forEach(function(row) {
        row.addEventListener('click', function(e) {
            if(e.target.closest('.action-cell') || e.target.tagName === 'A' || e.target.tagName === 'BUTTON' || e.target.closest('form')) return;
            window.location.href = this.dataset.href;
        });
    });
});
</script>
@endsection
