<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estagiario;
use App\Models\Departamento;
use App\Models\Supervisor;

class RelatorioController extends Controller
{
    /**
     * Tela inicial do módulo
     */
    public function index(Request $request)
{
    // Pegar todos os cursos distintos já cadastrados na tabela estagiarios
    $cursos = Estagiario::select('curso')
        ->distinct()
        ->orderBy('curso')
        ->pluck('curso');

    // Buscar estagiários com filtros
    $estagiarios = Estagiario::query()
        ->when($request->curso, fn($q) => $q->where('curso', $request->curso))
        ->when($request->departamento, fn($q) => $q->where('departamento', $request->departamento))
        ->when($request->supervisor, fn($q) => $q->where('supervisor', $request->supervisor))
        ->when($request->ano, fn($q) => $q->where('ano', $request->ano))
        ->paginate(10);

    // Passar para a view
    return view('relatorio.index', [
        'estagiarios' => $estagiarios,
        'cursos'      => $cursos
    ]);
}


    /**
     * Relatório — Estagiários filtrados
     */
    public function estagiarios(Request $request)
    {
        $query = Estagiario::query();

        if ($request->curso) {
            $query->where('curso', $request->curso);
        }

        if ($request->ano) {
            $query->where('ano', $request->ano);
        }

        if ($request->departamento) {
            $query->where('departamento', $request->departamento);
        }

        if ($request->supervisor) {
            $query->where('supervisor', $request->supervisor);
        }

        return view('relatorio.estagiarios', [
            'estagiarios'   => $query->paginate(12),
            'departamentos' => Departamento::all(),
            'supervisores'  => Supervisor::all(),
        ]);
    }
}
