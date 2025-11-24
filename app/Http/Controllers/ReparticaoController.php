<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reparticao;
use App\Models\Departamento;

class ReparticaoController extends Controller
{
    /**
     * Exibir lista de repartições
     */
    public function index()
    {
        $reparticoes = Reparticao::with('departamento')->orderBy('nome')->paginate(10);
        return view('reparticao.index', compact('reparticoes'));
    }

    /**
     * Mostrar formulário para criar nova repartição
     */
    public function create()
    {
        $departamentos = Departamento::orderBy('nome')->get();
        return view('reparticao.create', compact('departamentos'));
    }

    /**
     * Armazenar nova repartição no banco
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|max:20|unique:reparticoes,codigo',
            'nome' => 'required|string|max:255',
            'abreviatura' => 'required|string|max:50',
            'descricao' => 'nullable|string',
            'departamento_id' => 'nullable|exists:departamentos,id',
        ]);

        Reparticao::create($request->all());

        return redirect()->route('reparticao.index')
                         ->with('success', 'Repartição criada com sucesso.');
    }

    /**
     * Exibir detalhes de uma repartição
     */
    public function show($id)
    {
        $reparticao = Reparticao::with('departamento')->findOrFail($id);
        return view('reparticao.show', compact('reparticao'));
    }

    /**
     * Mostrar formulário de edição
     */
    public function edit($id)
    {
        $reparticao = Reparticao::findOrFail($id);
        $departamentos = Departamento::orderBy('nome')->get();
        return view('reparticao.edit', compact('reparticao', 'departamentos'));
    }

    /**
     * Atualizar repartição
     */
    public function update(Request $request, $id)
    {
        $reparticao = Reparticao::findOrFail($id);

        $request->validate([
            'codigo' => 'required|string|max:20|unique:reparticoes,codigo,' . $reparticao->id,
            'nome' => 'required|string|max:255',
            'abreviatura' => 'required|string|max:50',
            'descricao' => 'nullable|string',
            'departamento_id' => 'nullable|exists:departamentos,id',
        ]);

        $reparticao->update($request->all());

        return redirect()->route('reparticao.index')
                         ->with('success', 'Repartição atualizada com sucesso.');
    }

    /**
     * Apagar repartição
     */
    public function destroy($id)
    {
        $reparticao = Reparticao::findOrFail($id);
        $reparticao->delete();

        return redirect()->route('reparticao.index')
                         ->with('success', 'Repartição removida com sucesso.');
    }
}
