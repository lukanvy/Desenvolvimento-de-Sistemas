@extends('layouts.app')

@section('title', 'Cadastrar Estagiário')
@section('page-title', 'Cadastrar Estagiário')
@section('page-subtitle', 'Adicione um novo estagiário ao sistema')

@section('content')
<div class="container-fluid">
    <!-- Cabeçalho -->
   <x-logo-tipo/>
    <div class="form-container bg-white rounded-xl shadow-md p-6 max-w-4xl mx-auto">
        <h3 class="form-title mb-4">Novo Estagiário</h3>

        <form action="{{ route('estagiario.store') }}" method="POST" class="space-y-4">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="nome_completo" class="block text-sm font-medium text-gray-700">Nome Completo</label>
                    <input type="text" name="nome_completo" id="nome_completo" required
                        class="w-full border-gray-300 rounded shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="curso" class="block text-sm font-medium text-gray-700">Curso</label>
                    <input type="text" name="curso" id="curso" required
                        class="w-full border-gray-300 rounded shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="ano" class="block text-sm font-medium text-gray-700">Ano</label>
                    <input type="text" name="ano" id="ano" required
                        class="w-full border-gray-300 rounded shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" required
                        class="w-full border-gray-300 rounded shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="telefone" class="block text-sm font-medium text-gray-700">Telefone</label>
                    <input type="text" name="telefone" id="telefone"
                        class="w-full border-gray-300 rounded shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="supervisor" class="block text-sm font-medium text-gray-700">Supervisor</label>
                    <select name="supervisor" id="supervisor" required
                        class="w-full border-gray-300 rounded shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="" disabled selected>Selecione o Supervisor</option>
                        @foreach($supervisores as $supervisor)
                            <option value="{{ $supervisor->id }}">{{ $supervisor->nome }}</option>
                   @endforeach
                        </select>
                </div>

                <div>
                    <label for="alocacao" class="block text-sm font-medium text-gray-700">Alocação</label>
                    <input type="text" name="alocacao" id="alocacao"
                        class="w-full border-gray-300 rounded shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status" id="status"
                        class="w-full border-gray-300 rounded shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="Ativo">Ativo</option>
                        <option value="Inativo">Inativo</option>
                        <option value="Concluído">Concluído</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-end space-x-4 pt-4">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition flex items-center gap-1">
                    <i class="bi bi-check2-circle"></i> Salvar
                </button>
                <a href="{{ route('estagiario.index') }}"
                   class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400 transition flex items-center gap-1">
                   <i class="bi bi-x-circle"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
