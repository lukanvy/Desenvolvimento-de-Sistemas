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

  <!-- Sidebar -->
  <aside class="w-64 bg-blue-500 text-white flex flex-col p-6">
    <h5 class="text-xl font-semibold text-center mb-6">🎓 Gestão de Estagiários</h5>

    <nav class="flex flex-col space-y-2">
      <!-- Dashboard -->
        <a href="{{ route('dashboard') }}"
      class="flex items-center px-3 py-2 rounded transition 
      {{ request()->routeIs('dashboard') ? 'bg-blue-700 font-semibold' : 'hover:bg-blue-700' }}">
      <i class="bi bi-house-door-fill mr-2"></i> Dashboard
    </a>

      <!-- Estagiários -->
      <a href="{{ route('estagiario.create') }}" 
         class="flex items-center px-3 py-2 rounded transition 
         {{ request()->routeIs('estagiario.*') ? 'bg-blue-700 font-semibold' : 'hover:bg-blue-700' }}">
         <i class="bi bi-people-fill mr-2"></i> Estagiários
      </a>

      <!-- Departamentos -->
      <a href="{{ route('departamento.index') }}" 
         class="flex items-center px-3 py-2 rounded transition 
         {{ request()->routeIs('departamento.*') ? 'bg-blue-700 font-semibold' : 'hover:bg-blue-700' }}">
         <i class="bi bi-building mr-2"></i> Departamentos
      </a>

      <!-- Supervisores -->
      <a href="{{ route('supervisor.index') }}" 
         class="flex items-center px-3 py-2 rounded transition 
         {{ request()->routeIs('supervisor.*') ? 'bg-blue-700 font-semibold' : 'hover:bg-blue-700' }}">
         <i class="bi bi-person-workspace mr-2"></i> Supervisores
      </a>

      <!-- Horários -->
      <a href="{{ route('horario.index') }}" 
         class="flex items-center px-3 py-2 rounded transition 
         {{ request()->routeIs('horario.*') ? 'bg-blue-700 font-semibold' : 'hover:bg-blue-700' }}">
         <i class="bi bi-calendar-week mr-2"></i> Horários
      </a>

      <!-- Relatórios -->
      <a href="{{ route('relatorio.index') }}" 
         class="flex items-center px-3 py-2 rounded transition 
         {{ request()->routeIs('relatorio.*') ? 'bg-blue-700 font-semibold' : 'hover:bg-blue-700' }}">
         <i class="bi bi-bar-chart-line mr-2"></i> Relatórios
      </a>

      <!-- Configurações -->
      <a href="{{ route('configuracoes.index') }}" 
         class="flex items-center px-3 py-2 rounded transition 
         {{ request()->routeIs('configuracoes.*') ? 'bg-blue-700 font-semibold' : 'hover:bg-blue-700' }}">
         <i class="bi bi-gear-fill mr-2"></i> Configurações
      </a>
    </nav>
  </aside>

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
    <div class="text-center mb-8">
      <img src="{{ asset('imagens/up.jfif.jpg') }}" alt="Logotipo da Universidade" 
           class="w-24 h-24 mx-auto rounded-full shadow-md mb-3 object-cover">
      <h4 class="text-2xl font-bold text-blue-500">Universidade Pedagógica</h4>
    </div>

    <!-- Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

      <!-- Card Estagiários -->
      <a href="{{ route('estagiario.index') }}" 
         class="block bg-white shadow-md rounded-xl p-6 text-center cursor-pointer hover:shadow-lg transition">
        <div class="text-blue-600 text-4xl mb-2"><i class="bi bi-mortarboard-fill"></i></div>
        <h6 class="text-lg font-semibold">Estagiários</h6>
        <p class="text-gray-500">Total: <strong>{{ count($estagiarios) }}</strong></p>

        <p class="text-sm text-gray-400">Ver estagiários</p>
      </a>

      <!-- Card Supervisores -->
      <a href="{{ route('supervisor.index') }}"
         class="block bg-white shadow-md rounded-xl p-6 text-center cursor-pointer hover:shadow-lg transition">
        <div class="text-green-600 text-4xl mb-2"><i class="bi bi-person-workspace"></i></div>
        <h6 class="text-lg font-semibold">Supervisores</h6>
        <p class="text-gray-500">Total: <strong>{{ $totalSupervisores ?? 0 }}</strong></p>
        <p class="text-sm text-gray-400">Ver Supervisores</p>
      </a>

      <!-- Card Departamentos -->
      <a href="{{ route('departamento.index') }}"
         class="block bg-white shadow-md rounded-xl p-6 text-center cursor-pointer hover:shadow-lg transition">
        <div class="text-yellow-600 text-4xl mb-2"><i class="bi bi-building"></i></div>
        <h6 class="text-lg font-semibold">Departamentos</h6>
        <p class="text-gray-500">Total: <strong>{{ $totalDepartamentos ?? 0 }}</strong></p>
        <p class="text-sm text-gray-400">Ver Departamentos</p>
      </a>

      <!-- Card Relatórios -->
      <a href="{{ route('relatorio.index') }}"
         class="block bg-white shadow-md rounded-xl p-6 text-center cursor-pointer hover:shadow-lg transition">
        <div class="text-indigo-600 text-4xl mb-2"><i class="bi bi-bar-chart-line"></i></div>
        <h6 class="text-lg font-semibold">Relatórios</h6>
        <p class="text-sm text-gray-400">Ver relatórios</p>
      </a>

    </div>

  </main>

</body>
</html>
