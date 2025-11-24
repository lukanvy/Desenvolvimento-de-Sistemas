<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Supervisor</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-gray-50 flex min-h-screen">

   <!-- Logotipo e título fora do quadrado -->
   <x-logo-tipo/>

  <!-- Sidebar -->
  <x-sidebar/>

  <!-- Conteúdo principal -->
  <main class="flex-1 p-8">
    <!-- Topo -->
    <div class="flex justify-end mb-6 relative group">
      <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
        {{ Auth::user()->name ?? 'Admin' }} <i class="bi bi-caret-down-fill ml-1"></i>
      </button>
      <div class="absolute right-0 mt-2 w-40 bg-white border rounded shadow-lg hidden group-hover:block">
        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">Perfil</a>
        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">Configurações</a>
        <hr>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Sair</button>
        </form>
      </div>
    </div>

    <!-- Logotipo -->
    <div class="text-center mb-8">
      <img src="{{ asset('imagens/up.jfif.jpg') }}" alt="Logo Universidade"
           class="w-24 h-24 mx-auto rounded-full shadow-md mb-3 object-cover">
      <h4 class="text-2xl font-bold text-blue-500">Universidade Pedagógica</h4>
    </div>

    <!-- Formulário -->
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
              <option value="{{ $reparticao->id }}"
                {{ old('reparticao_id', $supervisor->reparticao_id) == $reparticao->id ? 'selected' : '' }}>
                {{ $reparticao->nome }}
              </option>
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

</body>
</html>
