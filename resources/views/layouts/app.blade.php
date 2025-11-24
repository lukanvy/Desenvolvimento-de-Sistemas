<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestão de Estagiários')</title>
    
    <!-- CSS do projeto -->
    @vite(['resources/css/estagiario.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    
   
</head>
<body class="bg-gradient-blue">
    <!-- Sidebar -->
  <div class="flex min-h-screen bg-gray-100">

    <!-- Sidebar -->
    <x-sidebar/>

    <!-- Conteúdo principal -->
    <div class="flex-1 flex flex-col">

        <!-- Cabeçalho superior -->
        <header class="flex justify-between items-center bg-white shadow p-4">
            <div>
                <h1 class="text-2xl font-semibold text-gray-800">
                    @yield('page-title', 'Gestão de Estagiários')
                </h1>
                <p class="text-sm text-gray-500">
                    @yield('page-subtitle', 'Sistema de gestão académica')
                </p>
            </div>

            <!-- Dropdown Admin -->
            <div class="relative">
                <button id="adminDropdownBtn" class="flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                    <i class="bi bi-person-circle text-lg"></i>
                    <span>Admin</span>
                    <i class="bi bi-caret-down-fill text-sm"></i>
                </button>

                <ul id="adminDropdownMenu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden">
                    <li>
                        <a href="#" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
                            <i class="bi bi-person mr-2"></i> Perfil
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
                            <i class="bi bi-gear mr-2"></i> Configurações
                        </a>
                    </li>
                    <li><hr class="my-1 border-gray-200"></li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-2 text-red-600 hover:bg-gray-100">
                            <i class="bi bi-box-arrow-right mr-2"></i> Sair
                        </a>
                    </li>
                </ul>
            </div>
        </header>

        <!-- Conteúdo principal -->
        <main class="flex-1 p-6 overflow-y-auto">
            @yield('content')
        </main>
    </div>
</div>

<!-- Script simples para dropdown -->
<script>
    document.getElementById('adminDropdownBtn').addEventListener('click', function () {
        document.getElementById('adminDropdownMenu').classList.toggle('hidden');
    });
</script>

</body>
</html>