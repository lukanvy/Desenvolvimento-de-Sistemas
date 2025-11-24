<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documento;
use App\Models\Estagiario;
use Illuminate\Support\Facades\Storage;

class DocumentoController extends Controller
{
    // Lista todos documentos
    public function index()
    {
        $documentos = Documento::with('estagiario')->latest()->get();
        return view('documento.index', compact('documentos'));
    }

    // Formulário de upload
    public function create($id)
    {
        $estagiario = Estagiario::findOrFail($id);
        return view('documento.create', compact('estagiario'));
    }

    // Salvar documento
    public function store(Request $request, $id)
    {
        $request->validate([
            'documento' => 'required|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:5120',
            'tipo' => 'required|string'
        ]);

        $file = $request->file('documento');
        $path = $file->store('documentos', 'public');

        Documento::create([
            'estagiario_id' => $id,
            'tipo' => $request->tipo,
            'nome_original' => $file->getClientOriginalName(),
            'caminho' => $path
        ]);

        return redirect()->route('documento.index')
            ->with('success', 'Documento carregado com sucesso!');
    }

    // Excluir documento
    public function destroy(Documento $documento)
    {
        Storage::disk('public')->delete($documento->caminho);
        $documento->delete();

        return redirect()->back()->with('success', 'Documento removido!');
    }
}
