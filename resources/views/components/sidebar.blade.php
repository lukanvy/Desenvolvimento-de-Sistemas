
    <!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
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
      <a href="{{ route('estagiario.index') }}" 
         class="flex items-center px-3 py-2 rounded transition 
         {{ request()->routeIs('estagiario.*') ? 'bg-blue-700 font-semibold' : 'hover:bg-blue-700' }}">
         <i class="bi bi-people-fill mr-2"></i> Estagiários
      </a>

      <!-- Departamentos -->
      <a href="{{ route('departamentos.index') }}" 
         class="flex items-center px-3 py-2 rounded transition 
         {{ request()->routeIs('departamentos.*') ? 'bg-blue-700 font-semibold' : 'hover:bg-blue-700' }}">
         <i class="bi bi-building mr-2"></i> Departamentos
      </a>

      <!-- Supervisores -->
      <a href="{{ route('supervisor.index') }}" 
         class="flex items-center px-3 py-2 rounded transition 
         {{ request()->routeIs('supervisor.*') ? 'bg-blue-700 font-semibold' : 'hover:bg-blue-700' }}">
         <i class="bi bi-person-workspace mr-2"></i> Supervisores
      </a>

      <!-- Horários -->
      <a href="{{ route('documento.index') }}" 
         class="flex items-center px-3 py-2 rounded transition 
         {{ request()->routeIs('documento.*') ? 'bg-blue-700 font-semibold' : 'hover:bg-blue-700' }}">
         <i class="bi bi-calendar-week mr-2"></i> Documentos
      </a>

      
            <!-- Avaliações -->
     <a href="{{ route('avaliacao.index') }}" 
        class="flex items-center px-3 py-2 rounded transition 
        {{ request()->routeIs('avaliacao.*') ? 'bg-blue-700 font-semibold' : 'hover:bg-blue-700' }}">
        <i class="bi bi-journal-check mr-2"></i> Avaliações </a>
     
      <!-- Repartições -->
      <a href="{{ route('reparticao.index') }}" 
        class="flex items-center px-3 py-2 rounded transition 
        {{ request()->routeIs('reparticao.*') ? 'bg-blue-700 font-semibold' : 'hover:bg-blue-700' }}">
        <i class="bi bi-building-fill-check mr-2"></i> Repartições
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
