<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstagiarioController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\SupervisoresController;
use App\Http\Controllers\ReparticaoController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\DocumentoController;
use App\Models\Estagiario;


Route::get('/', [EstagiarioController::class, 'dashboard'])->name('dashboard');

Route::get('/estagiario/historico', [EstagiarioController::class, 'historico'])->name('estagiario.historico');


Route::post('/estagiario/{id}/encerrar', [EstagiarioController::class, 'encerrar'])->name('estagiario.encerrar');

Route::resource('estagiario', EstagiarioController::class);


Route::get('/estagiarios/{id}/edit', [EstagiarioController::class, 'edit'])->name('estagiarios.edit');

Route::put('/estagiarios/{id}', [EstagiarioController::class, 'update'])->name('estagiarios.update');

//Supervisores
Route::resource('supervisor', SupervisoresController::class);
//Departamento
Route::resource('departamentos', DepartamentoController::class);

//reparticao
Route::resource('reparticao', ReparticaoController::class);

//avaliacao
Route::resource('avaliacao', AvaliacaoController::class);

//documentos

// Lista todos os documentos
Route::get('/documentos', [DocumentoController::class, 'index'])
    ->name('documento.index');

// Formulário para novo documento
Route::get('/estagiarios/{id}/documentos/create', [DocumentoController::class, 'create'])
    ->name('documento.create');

// Upload do documento
Route::post('/estagiarios/{id}/documento', [DocumentoController::class, 'store'])
    ->name('documento.store');

// Excluir documento
Route::delete('/documentos/{documento}', [DocumentoController::class, 'destroy'])
    ->name('documento.destroy');


//relatoriosuse App\Http\Controllers\RelatorioController;

Route::prefix('relatorios')->group(function () {
    Route::get('/', [RelatorioController::class, 'index'])->name('relatorio.index');
    Route::get('/estagiarios', [RelatorioController::class, 'estagiarios'])->name('relatorio.estagiarios');
});

Route::get('/configuracoes', function () { return 'Configurações'; })->name('configuracoes.index');
Route::get('/logout', function () { return 'Logout'; })->name('logout');