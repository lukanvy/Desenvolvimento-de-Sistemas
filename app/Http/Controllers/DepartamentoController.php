<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::orderBy('nome')->paginate(10);
        return view('departamentos.index', compact('departamentos'));
    }

    public function create()
    {
        return view('departamentos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:departamentos,codigo',
            'nome' => 'required',
            'abreviatura' => 'required',
            'descricao' => 'nullable',
            'email' => 'nullable|email',
        ]);

        Departamento::create($request->all());

        return redirect()->route('departamentos.index')
                         ->with('success', 'Departamento criado com sucesso!');
    }

    public function show(Departamento $departamento)
    {
        return view('departamentos.show', compact('departamento'));
    }

    public function edit(Departamento $departamento)
    {
        return view('departamentos.edit', compact('departamento'));
    }

    public function update(Request $request, Departamento $departamento)
    {
        $request->validate([
            'codigo' => 'required|unique:departamentos,codigo,' . $departamento->id,
            'nome' => 'required',
            'abreviatura' => 'required',
            'descricao' => 'nullable',
            'email' => 'nullable|email',
        ]);

        $departamento->update($request->all());

        return redirect()->route('departamentos.index')
                         ->with('success', 'Departamento atualizado com sucesso!');
    }

    public function destroy(Departamento $departamento)
    {
        $departamento->delete();

        return redirect()->route('departamentos.index')
                         ->with('success', 'Departamento apagado com sucesso!');
    }
}
