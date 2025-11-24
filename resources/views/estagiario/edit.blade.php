@extends('layouts.app')

@section('title', 'Editar Estagiário')
@section('page-title', 'Editar Estagiário')
@section('page-subtitle', 'Atualize os dados do estagiário')

@section('content')

<!-- Logotipo e título fora do card -->
<x-logo-tipo/>
<div class="container mx-auto max-w-4xl">
    <div class="bg-white rounded-lg shadow p-6">

        <h3 class="text-xl font-semibold mb-6">Editar Estagiário</h3>

        <form action="{{ route('estagiario.update', $estagiario->id) }}" 
              method="POST" enctype="multipart/form-data" 
              class="space-y-4">
            @csrf
            @method('PUT')
            <!-- Dados pessoais -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Nome Completo</label>
                    <input type="text" name="nome_completo" required
                        value="{{ old('nome_completo', $estagiario->nome_completo) }}"
                        class="w-full border border-gray-300 rounded px-3 py-2">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Curso</label>
                    <input type="text" name="curso" required
                        value="{{ old('curso', $estagiario->curso) }}"
                        class="w-full border border-gray-300 rounded px-3 py-2">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Ano</label>
                    <input type="text" name="ano" required
                        value="{{ old('ano', $estagiario->ano) }}"
                        class="w-full border border-gray-300 rounded px-3 py-2">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Email</label>
                    <input type="email" name="email" required
                        value="{{ old('email', $estagiario->email) }}"
                        class="w-full border border-gray-300 rounded px-3 py-2">
                </div>
            </div>

            <!-- Contato e Supervisor -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Telefone</label>
                    <input type="text" name="telefone"
                        value="{{ old('telefone', $estagiario->telefone) }}"
                        class="w-full border border-gray-300 rounded px-3 py-2">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Supervisor</label>
                    <select name="supervisor" required
                        class="w-full border border-gray-300 rounded px-3 py-2">
                        <option value="" disabled>Selecione o Supervisor</option>
                        @forelse($supervisores as $s)
                            <option value="{{ $s->id }}"
                                {{ old('supervisor', $estagiario->supervisor_id) == $s->id ? 'selected' : '' }}>
                                {{ $s->nome }}
                            </option>
                        @empty
                            <option disabled>Nenhum supervisor cadastrado</option>
                        @endforelse
                    </select>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Alocação</label>
                    <input type="text" name="alocacao"
                        value="{{ old('alocacao', $estagiario->alocacao) }}"
                        class="w-full border border-gray-300 rounded px-3 py-2">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Status</label>
                    <select name="status" class="w-full border border-gray-300 rounded px-3 py-2">
                        <option value="Ativo" {{ $estagiario->status=='Ativo' ? 'selected' : '' }}>Ativo</option>
                        <option value="Inativo" {{ $estagiario->status=='Inativo' ? 'selected' : '' }}>Inativo</option>
                        <option value="Concluído" {{ $estagiario->status=='Concluído' ? 'selected' : '' }}>Concluído</option>
                    </select>
                </div>
            </div>

            <!-- Anexo -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Anexo (PDF ou DOCX)</label>
                <input type="file" name="carta" accept=".pdf,.doc,.docx"
                       class="w-full border border-gray-300 rounded px-3 py-2">
                @if ($estagiario->carta)
                    <p class="mt-2 text-sm text-gray-600">
                        📎 <a href="{{ asset('storage/' . $estagiario->carta) }}" target="_blank" class="text-blue-600 hover:underline">Ver carta atual</a>
                    </p>
                @endif
            </div>

            <!-- Botões -->
            <div class="flex justify-end gap-4 pt-4">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Atualizar
                </button>
                <a href="{{ route('estagiario.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">
                    Cancelar
                </a>
            </div>

        </form>
    </div>
</div>

@endsection
