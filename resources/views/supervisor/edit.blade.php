@extends('layouts.app')

@section('title', 'Editar Supervisor')
@section('page-title', 'Editar Supervisor')
@section('page-subtitle', 'Atualize os dados do supervisor')

@section('content')
<main class="flex-1 p-8">

    <!-- Topo com usuário -->
    <div class="flex justify-end mb-6 relative group">
      <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
        {{ Auth::user()->name ?? 'Admin' }} <i class="bi bi-caret-down-fill ml-1"></i>
      </button>
    </div>

    <!-- Logotipo -->
    <div class="text-center mb-8">
      <x-logo-tipo/>
    </div>

    <!-- Formulário de edição -->
    <div class="bg-white rounded-xl shadow-md p-8 max-w-3xl mx-auto">
      <h2 class="text-xl font-semibold text-gray-700 mb-6 text-center">Editar Supervisor</h2>

      <form action="{{ route('supervisor.update', $supervisor->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
          <div>
            <label for="codigo" class="block text-sm font-medium text-gray-700">Código</label>
            <input type="text" id="codigo" name="codigo" required
                   value="{{ old('codigo', $supervisor->codigo) }}"
                   class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
          </div>
          <div class="sm:col-span-2">
            <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
            <input type="text" id="nome" name="nome" required
                   value="{{ old('nome', $supervisor->nome) }}"
                   class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div>
            <label for="area_formacao" class="block text-sm font-medium text-gray-700">Área de Formação</label>
            <input type="text" id="area_formacao" name="area_formacao" required
                   value="{{ old('area_formacao', $supervisor->area_formacao) }}"
                   class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
          </div>
          <div>
            <label for="area_atuacao" class="block text-sm font-medium text-gray-700">Área de Atuação</label>
            <input type="text" id="area_atuacao" name="area_atuacao" required
                   value="{{ old('area_atuacao', $supervisor->area_atuacao) }}"
                   class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
          </div>
        </div>

        <div>
          <label for="cargo" class="block text-sm font-medium text-gray-700">Cargo</label>
          <input type="text" id="cargo" name="cargo" required
                 value="{{ old('cargo', $supervisor->cargo) }}"
                 class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
          <label for="tarefas" class="block text-sm font-medium text-gray-700">Tarefas</label>
          <textarea id="tarefas" name="tarefas" rows="3"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('tarefas', $supervisor->tarefas) }}</textarea>
        </div>

        <div>
          <label for="reparticao_id" class="block text-sm font-medium text-gray-700">Repartição</label>
          <select id="reparticao_id" name="reparticao_id" required
                  class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @foreach($reparticoes as $reparticao)
              <option value="{{ $reparticao->id }}" {{ $supervisor->reparticao_id == $reparticao->id ? 'selected' : '' }}>{{ $reparticao->nome }}</option>
            @endforeach
          </select>
        </div>

        <div class="flex justify-end space-x-4 pt-4">
          <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">
            Atualizar
          </button>
          <a href="{{ route('supervisor.index') }}" 
             class="bg-gray-300 text-gray-800 px-5 py-2 rounded-lg hover:bg-gray-400 transition">
            Cancelar
          </a>
        </div>
      </form>
    </div>
</main>
@endsection