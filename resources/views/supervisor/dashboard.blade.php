<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema de Gestão de Estagiários</title>
  
  <script src="https://cdn.tailwindcss.com"></script>
  

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-gray-50 flex min-h-screen">

  <x-sidebar/>

  <!-- Conteúdo principal -->
  <main class="flex-1 p-8">
    
    <!-- Topo com botão admin -->
    <div class="flex justify-end mb-6 relative group">
      <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
        Admin <i class="bi bi-caret-down-fill ml-1"></i>
      </button>
      <!-- Menu dropdown -->
      <div class="absolute right-0 mt-2 w-40 bg-white border rounded shadow-lg hidden group-hover:block">
        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">Perfil</a>
        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">Configurações</a>
        <hr>
        <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Sair</a>
      </div>
    </div>

    <!-- Logotipo -->
    <x-logo-tipo/>
    <!-- Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

      <!-- Card Estagiários -->
      <x-home-card>
     <i class="bi bi-mortarboard-fill"></i></div>
        <h6 class="text-lg font-semibold">Estagiários</h6>
        <p class="text-gray-500">Total: <strong>{{ count($estagiarios) }}</strong></p>
        <p class="text-sm text-gray-400">Ver estagiários</p>
      
      </x-home-card>
      <!-- Card Supervisores -->
      <a href="{{ route('supervisor.trabalho') }}"
         class="block bg-white shadow-md rounded-xl p-6 text-center cursor-pointer hover:shadow-lg transition">
        <div class="text-green-600 text-4xl mb-2"><i class="bi bi-person-workspace"></i></div>
        <h6 class="text-lg font-semibold">Trabalhos</h6>
        <p class="text-gray-500">Total: <strong>{{ $totalTrabalhos ?? 0 }}</strong></p>
        <p class="text-sm text-gray-400">Ver Trabalhos</p>
      </a>


      <!-- Card Relatórios -->
      <a href="{{ route('relatorio.trabalhos') }}"
         class="block bg-white shadow-md rounded-xl p-6 text-center cursor-pointer hover:shadow-lg transition">
        <div class="text-indigo-600 text-4xl mb-2"><i class="bi bi-bar-chart-line"></i></div>
        <h6 class="text-lg font-semibold">Relatórios</h6>
        <p class="text-sm text-gray-400">Ver relatórios</p>
      </a>

    </div>

  </main>

</body>
</html>
