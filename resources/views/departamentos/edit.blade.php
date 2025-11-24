@extends('layouts.app')

@section('title', 'Editar Departamento')
@section('page-title', 'Editar Departamento')
@section('page-subtitle', 'Atualize os dados do departamento')

@section('content')
<div class="container mx-auto max-w-4xl p-6">

    <x-logo-tipo/>

    <div class="bg-white rounded-lg shadow p-6">

        <form action="{{ route('departamentos.update', $departamento->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Código + Nome -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Código</label>
                    <input type="text" name="codigo"
                           value="{{ old('codigo', $departamento->codigo) }}"
                           class="w-full border border-gray-300 rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Nome</label>
                    <input type="text" name="nome"
                           value="{{ old('nome', $departamento->nome) }}"
                           class="w-full border border-gray-300 rounded px-3 py-2" required>
                </div>
            </div>

            <!-- Abreviatura + Email -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Abreviatura</label>
                    <input type="text" name="abreviatura"
                           value="{{ old('abreviatura', $departamento->abreviatura) }}"
                           class="w-full border border-gray-300 rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Email</label>
                    <input type="email" name="email"
                           value="{{ old('email', $departamento->email) }}"
                           class="w-full border border-gray-300 rounded px-3 py-2">
                </div>
            </div>

            <!-- Descrição -->
            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-1">Descrição</label>
                <textarea name="descricao" rows="3"
                          class="w-full border border-gray-300 rounded px-3 py-2">{{ old('descricao', $departamento->descricao) }}</textarea>
            </div>

            <!-- Botões -->
            <div class="flex justify-end gap-4 pt-4">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    Atualizar
                </button>

                <a href="{{ route('departamentos.index') }}"
                   class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">
                    Cancelar
                </a>
            </div>

        </form>
    </div>
</div>
@endsection
