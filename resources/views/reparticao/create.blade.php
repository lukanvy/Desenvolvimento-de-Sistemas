@extends('layouts.app')

@section('title', 'Cadastrar Repartição')
@section('page-title', 'Cadastrar Repartição')
@section('page-subtitle', 'Adicione uma nova repartição ao sistema')

@section('content')
<div class="container-fluid">
    <!-- Cabeçalho -->
    <x-logo-tipo/>
    
    <div class="form-container bg-white rounded-xl shadow-md p-6 max-w-4xl mx-auto">
        <h3 class="form-title mb-4">Nova Repartição</h3>

        <form action="{{ route('reparticao.store') }}" method="POST" class="space-y-4">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div>
                    <label for="nome" class="block text-sm font-medium text-gray-700">Nome *</label>
                    <input type="text" name="nome" id="nome" value="{{ old('nome') }}" required
                        class="w-full border-gray-300 rounded shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="abreviatura" class="block text-sm font-medium text-gray-700">Abreviatura *</label>
                    <input type="text" name="abreviatura" id="abreviatura" value="{{ old('abreviatura') }}" required
                        class="w-full border-gray-300 rounded shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="md:col-span-2">
                    <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição</label>
                    <textarea name="descricao" id="descricao" rows="3"
                        class="w-full border-gray-300 rounded shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Breve descrição da repartição...">{{ old('descricao') }}</textarea>
                </div>

                <div class="md:col-span-2">
                    <label for="departamento_id" class="block text-sm font-medium text-gray-700">Departamento *</label>
                    <select name="departamento_id" id="departamento_id" required
                        class="w-full border-gray-300 rounded shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="" disabled selected>Selecione o Departamento</option>
                        @foreach($departamentos as $departamento)
                            <option value="{{ $departamento->id }}" {{ old('departamento_id') == $departamento->id ? 'selected' : '' }}>
                                {{ $departamento->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="flex justify-end space-x-4 pt-4">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition flex items-center gap-1">
                    <i class="bi bi-check2-circle"></i> Salvar
                </button>
                <a href="{{ route('reparticao.index') }}"
                   class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400 transition flex items-center gap-1">
                   <i class="bi bi-x-circle"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
