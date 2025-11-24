<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supervisor;
use App\Models\Reparticao;
use App\Models\Departamento;

class SupervisoresController extends Controller
{
    // Listar todos os supervisores
    public function index()
    {
        $supervisores = Supervisor::orderBy('nome')->get();
        return view('supervisor.index', compact('supervisores'));
    }

    // Tela de cadastro
    public function create()
    {
        $reparticoes = Reparticao::all();
        $departamentos = Departamento::all();
        return view('supervisor.create', compact('reparticoes', 'departamentos'));
    }

    // Salvar novo supervisor
    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo' => 'required|string|max:50|unique:supervisores,codigo',
            'nome' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'area_formacao' => 'required|string|max:255',
            'area_atuacao' => 'required|string|max:255',
            'tarefas' => 'nullable|string',
            'reparticao_id' => 'required|exists:reparticoes,id',
        ]);

        Supervisor::create($validated);

        return redirect()->route('supervisor.index')->with('success', 'Supervisor criado com sucesso!');
    }

    // Tela de edição
  
    public function edit($id)
{
    $supervisor = Supervisor::findOrFail($id); // pega o supervisor específico
    $reparticoes = Reparticao::all();          // todas as repartições para o select

    return view('supervisor.edit', compact('supervisor', 'reparticoes'));
}


    // Atualizar supervisor
    public function update(Request $request, $id)
    {
        $supervisor = Supervisor::findOrFail($id);

        $validated = $request->validate([
            'codigo' => 'required|string|max:50|unique:supervisores,codigo,' . $supervisor->id,
            'nome' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'area_formacao' => 'required|string|max:255',
            'area_atuacao' => 'required|string|max:255',
            'tarefas' => 'nullable|string',
            'reparticao_id' => 'required|exists:reparticoes,id',
        ]);

        $supervisor->update($validated);

        return redirect()->route('supervisor.index')->with('success', 'Supervisor atualizado com sucesso!');
    }

    // Excluir supervisor
    public function destroy($id)
    {
        $supervisor = Supervisor::findOrFail($id);
        $supervisor->delete();

        return redirect()->route('supervisor.index')->with('success', 'Supervisor removido com sucesso!');
    }

    // Detalhes de um supervisor (opcional)
    public function show($id)
    {
        $supervisor = Supervisor::findOrFail($id);
        return view('supervisor.show', compact('supervisor'));
    }
}
