<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstagiarioController;
use App\Http\Controllers\DepartamentoController;
use App\Models\Estagiario;




Route::get('/', [EstagiarioController::class, 'dashboard'])->name('dashboard');


Route::get('/estagiario/historico', [EstagiarioController::class, 'historico'])->name('estagiario.historico');


Route::post('/estagiario/{id}/encerrar', [EstagiarioController::class, 'encerrar'])->name('estagiario.encerrar');


Route::resource('estagiario', EstagiarioController::class);



Route::resource('departamento', DepartamentoController::class);

Route::get('/estagiarios/{id}/edit', [EstagiarioController::class, 'edit'])->name('estagiarios.edit');
Route::put('/estagiarios/{id}', [EstagiarioController::class, 'update'])->name('estagiarios.update');



Route::get('/supervisores', function () { return 'Supervisores'; })->name('supervisor.index');
Route::get('/horarios', function () { return 'Horários'; })->name('horario.index');
Route::get('/relatorios', function () { return 'Relatórios'; })->name('relatorio.index');
Route::get('/configuracoes', function () { return 'Configurações'; })->name('configuracoes.index');
Route::get('/logout', function () { return 'Logout'; })->name('logout');