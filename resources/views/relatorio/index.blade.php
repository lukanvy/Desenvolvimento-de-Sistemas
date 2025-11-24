@extends('layouts.app')

@section('title', 'Relatórios do Sistema')
@section('page-title', 'Módulo de Relatórios')
@section('page-subtitle', 'Gere relatórios estatísticos e analíticos do sistema')

@section('content')
<div class="container-fluid">
    
    <!-- Cabeçalho -->
    <x-logo-tipo/>

    <!-- Card principal -->
    <div class="form-container">
        <div class="form-header">
            <div class="form-icon">
                <i class="bi bi-bar-chart-fill"></i>
            </div>
            <div>
                <p class="form-subtitle">Selecione o tipo de relatório que deseja gerar</p>
            </div>
        </div>

        <!-- Lista de relatórios -->
        <div class="row g-4 mt-3">

            <!-- Relatório de Estagiários -->
            <div class="col-md-4 col-lg-2">
                <div class="shadow-sm p-2 rounded-xl border bg-white hover:bg-gray-50 transition">
                    <h6 class="fw-bold mb-2"><i class="bi bi-people-fill me-2 text-primary"></i>Estagiários</h6>
                    <p class="text-muted mb-3">Liste estagiários por curso, ano, departamento ou supervisor.</p>
                    <a href="{{ route('relatorio.estagiarios') }}"
                       class="flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded-full text-sm font-medium">
                        <i class="bi bi-search"></i>
                        Gerar Relatório
                    </a>
                </div>
            </div>

            <!-- Relatório de Desempenho -->
            <div class="col-md-4 col-lg-2">
                <div class="shadow-sm p-2 rounded-xl border bg-white hover:bg-gray-50 transition">
                    <h6 class="fw-bold mb-2"><i class="bi bi-graph-up-arrow me-2 text-success"></i>Desempenho</h6>
                    <p class="text-muted mb-3">Analise avaliações, notas, progresso e classificações.</p>
                    <a href="#" 
                       class="flex items-center gap-2 bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-full text-sm font-medium disabled opacity-60 cursor-not-allowed"
                       title="Em desenvolvimento">
                        <i class="bi bi-bar-chart-line"></i>
                        Em breve
                    </a>
                </div>
            </div>

            <!-- Histórico do Estagiário -->
            <div class="col-md-6 col-lg-4">
                <div class="shadow-sm p-4 rounded-xl border bg-white hover:bg-gray-50 transition">
                    <h6 class="fw-bold mb-2"><i class="bi bi-clock-history me-2 text-warning"></i>Histórico de Estágios</h6>
                    <p class="text-muted mb-3">Veja o percurso completo do estudante ao longo dos anos.</p>
                    <a href="#" 
                       class="flex items-center gap-2 bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded-full text-sm font-medium disabled opacity-60 cursor-not-allowed"
                       title="Em desenvolvimento">
                        <i class="bi bi-journal-text"></i>
                        Em breve
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
.form-container {
    max-width: 100%;
    margin: 0 auto;
}
.rounded-xl {
    border-radius: 1rem;
}
</style>
@endsection
