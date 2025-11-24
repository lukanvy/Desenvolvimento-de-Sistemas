@extends('layouts.app')

@section('title', 'Editar Repartição')
@section('page-title', 'Editar Repartição')
@section('page-subtitle', $reparticao->nome)

@section('content')
<div class="container mx-auto max-w-4xl p-6">

    <!-- Logotipo e título fora do card -->
   <x-logo-tipo/>

    <!-- Formulário -->
    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('reparticao.update', $reparticao->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Linha 1: Código + Nome -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="codigo" class="block text-gray-700 font-medium mb-1">Código</label>
                    <input type="text" name="codigo" id="codigo"
                           value="{{ old('codigo', $reparticao->codigo) }}"
                           class="w-full border border-gray-300 rounded px-3 py-2"
                           required>
                </div>
                <div>
                    <label for="nome" class="block text-gray-700 font-medium mb-1">Nome</label>
                    <input type="text" name="nome" id="nome"
                           value="{{ old('nome', $reparticao->nome) }}"
                           class="w-full border border-gray-300 rounded px-3 py-2"
                           required>
                </div>
            </div>

            <!-- Linha 2: Abreviatura + Departamento -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="abreviatura" class="block text-gray-700 font-medium mb-1">Abreviatura</label>
                    <input type="text" name="abreviatura" id="abreviatura"
                           value="{{ old('abreviatura', $reparticao->abreviatura) }}"
                           class="w-full border border-gray-300 rounded px-3 py-2"
                           required>
                </div>
                <div>
                    <label for="departamento_id" class="block text-gray-700 font-medium mb-1">Departamento</label>
                    <select name="departamento_id" id="departamento_id"
                            class="w-full border border-gray-300 rounded px-3 py-2">
                        <option value="" disabled>Selecione o Departamento</option>
                        @foreach($departamentos as $departamento)
                            <option value="{{ $departamento->id }}"
                                {{ $reparticao->departamento_id == $departamento->id ? 'selected' : '' }}>
                                {{ $departamento->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Linha 3: Descrição -->
            <div class="mb-6">
                <label for="descricao" class="block text-gray-700 font-medium mb-1">Descrição</label>
                <textarea name="descricao" id="descricao" rows="3"
                          class="w-full border border-gray-300 rounded px-3 py-2">{{ old('descricao', $reparticao->descricao) }}</textarea>
            </div>

            <!-- Botões -->
            <div class="flex justify-end gap-4 pt-4">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    Atualizar
                </button>
                <a href="{{ route('reparticao.index') }}"
                   class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">
                    Cancelar
                </a>
            </div>

        </form>
    </div>
</div>
@endsection
