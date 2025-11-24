@extends('layouts.app') 
@section('page-title', 'Criar Departamento')
@section('page-subtitle', 'Preencha os dados para criar um novo departamento')

@section('content')
<div class="container mx-auto p-6">

    <!-- Logo Tipo -->
    <div class="flex justify-center mb-6"></div>
  
 <x-logo-tipo/>

    <!-- Formulário -->
    <div class="bg-white shadow rounded-lg p-6 max-w-3xl mx-auto">
        <form action="{{ route('departamentos.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Linha 1: Código + Nome -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label for="codigo" class="block text-sm font-medium text-gray-700">Código</label>
                    <input type="text" id="codigo" name="codigo" required
                           class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="sm:col-span-2">
                    <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                    <input type="text" id="nome" name="nome" required
                           class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <!-- Linha 2: Abreviatura + Email -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="abreviatura" class="block text-sm font-medium text-gray-700">Abreviatura</label>
                    <input type="text" id="abreviatura" name="abreviatura" required
                           class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email"
                           class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <!-- Linha 3: Descrição -->
            <div>
                <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição</label>
                <textarea id="descricao" name="descricao" rows="3"
                          class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>

            <!-- Botões -->
            <div class="flex justify-end space-x-4 pt-4">
                <button type="submit" 
                        class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition flex items-center gap-1">
                    <i class="bi bi-check2-circle"></i> Salvar
                </button>
                <a href="{{ route('departamentos.index') }}" 
                   class="bg-gray-300 text-gray-800 px-5 py-2 rounded-lg hover:bg-gray-400 transition flex items-center gap-1">
                    <i class="bi bi-x-circle"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
