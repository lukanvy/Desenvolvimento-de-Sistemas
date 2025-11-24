<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avaliacao;
use Illuminate\Support\Facades\Storage;

class AvaliacaoController extends Controller
{
    public function index()
    {
        $avaliacoes = Avaliacao::orderBy('codigo')->paginate(10);
        return view('avaliacao.index', compact('avaliacoes'));
    }

    public function create()
    {
        return view('avaliacao.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:avaliacoes,codigo',
            'pontualidade' => 'nullable|integer|min:0|max:10',
            'qualidade_trabalho' => 'nullable|integer|min:0|max:10',
            'colaboracao' => 'nullable|integer|min:0|max:10',
            'iniciativa' => 'nullable|integer|min:0|max:10',
            'nota' => 'nullable|numeric|min:0|max:20',
            'comentario_supervisor' => 'nullable|string',
            'relatorio' => 'nullable|file|mimes:pdf,doc,docx'
        ]);

        $data = $request->all();

        if ($request->hasFile('relatorio')) {
            $data['relatorio'] = $request->file('relatorio')->store('relatorios');
        }

        Avaliacao::create($data);

        return redirect()->route('avaliacao.index')->with('success', 'Avaliação registrada com sucesso.');
    }

    public function show($id)
    {
        $avaliacao = Avaliacao::findOrFail($id);
        return view('avaliacao.show', compact('avaliacao'));
    }

    public function edit($id)
    {
        $avaliacao = Avaliacao::findOrFail($id);
        return view('avaliacao.edit', compact('avaliacao'));
    }

    public function update(Request $request, $id)
    {
        $avaliacao = Avaliacao::findOrFail($id);

        $request->validate([
            'codigo' => 'required|unique:avaliacoes,codigo,' . $avaliacao->id,
            'pontualidade' => 'nullable|integer|min:0|max:10',
            'qualidade_trabalho' => 'nullable|integer|min:0|max:10',
            'colaboracao' => 'nullable|integer|min:0|max:10',
            'iniciativa' => 'nullable|integer|min:0|max:10',
            'nota' => 'nullable|numeric|min:0|max:20',
            'comentario_supervisor' => 'nullable|string',
            'relatorio' => 'nullable|file|mimes:pdf,doc,docx'
        ]);

        $data = $request->all();

        if ($request->hasFile('relatorio')) {
            // Apaga arquivo antigo
            if ($avaliacao->relatorio) Storage::delete($avaliacao->relatorio);
            $data['relatorio'] = $request->file('relatorio')->store('relatorios');
        }

        $avaliacao->update($data);

        return redirect()->route('avaliacao.index')->with('success', 'Avaliação atualizada com sucesso.');
    }

    public function destroy($id)
    {
        $avaliacao = Avaliacao::findOrFail($id);

        if ($avaliacao->relatorio) Storage::delete($avaliacao->relatorio);

        $avaliacao->delete();

        return redirect()->route('avaliacao.index')->with('success', 'Avaliação removida com sucesso.');
    }
}
