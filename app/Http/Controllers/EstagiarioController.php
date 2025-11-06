<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estagiario;


class EstagiarioController extends Controller
{
    

     public function index()
    {
       
        
        
        $estagiarios = Estagiario::orderBy('created_at', 'desc')->paginate(10);
        
        return view('estagiario.index', compact('estagiarios'));
    }
    
    public function create()
    {
        return view('estagiario.form2');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome_completo' => 'required|string|max:255',
            'curso' => 'required|string|max:255',
            'ano' => 'required|integer',
            'bi' => 'required|string|max:50',
            'email' => 'required|email|max:255|unique:estagiarios,email',
            'telefone' => 'required|string|max:50',
            'supervisor' => 'required|string|max:255',
            'alocacao' => 'required|string|max:255',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
            'observacoes' => 'nullable|string',
            'carta' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        Estagiario::create($validated);

        return redirect()->route('estagiario.index')->with('success', 'Estagiário cadastrado com sucesso!');
    }

    
    public function show($id)
    {
        $estagiario = Estagiario::findOrFail($id);
        return view('estagiario.show', compact('estagiario'));
    }
    
   
    public function edit($id)
    {
        $estagiario = Estagiario::findOrFail($id);
        return view('estagiario.editar', compact('estagiario'));
    }

    /**
     * Atualiza os dados do estagiário bd (estagiario.update).
     */
    public function update(Request $request, $id)
    {
        $estagiario = Estagiario::findOrFail($id);

        $validated = $request->validate([
            'nome_completo' => 'required|string|max:255',
            'curso' => 'required|string|max:255',
            'ano' => 'required|integer',
            'bi' => 'required|string|max:50',
            'email' => 'required|email|max:255|unique:estagiarios,email,' . $estagiario->id,
            'telefone' => 'required|string|max:50',
            'supervisor' => 'required|string|max:255',
            'alocacao' => 'required|string|max:255',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
            'observacoes' => 'nullable|string',
            'carta' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $estagiario->update($validated);

        return redirect()->route('estagiario.index')->with('success', 'Estagiário atualizado com sucesso!');
    }

    /**
     * Remove um estagiário do bd (estagiario.destroy).
     */
    public function destroy($id)
    {
        $estagiario = Estagiario::findOrFail($id);
        $estagiario->delete();

        return redirect()->route('estagiario.index')->with('success', 'Estagiário removido com sucesso!');
    }


    // Funções Adicionais / Personalizadas

    /**
     * Lista estagiários com status Encerrado (estagiario.historico).
     */
    public function historico()
    {
        $estagiarios = Estagiario::where('status', 'Encerrado')->get();
        return view('estagiario.historico', compact('estagiarios'));
    }

    /**
     * Encerra um estágio (estagiario.encerrar).
     */
    public function encerrar($id)
    {
        $estagiario = Estagiario::findOrFail($id);
        $estagiario->status = 'Encerrado';
        $estagiario->save();

        return redirect()->route('estagiario.index')->with('success', 'Estágio encerrado com sucesso!');
    }

    /**
     * Apresenta dados para o painel (dashboard).
     */
   public function dashboard()
{
    $estagiarios = \App\Models\Estagiario::all(); // todos ou apenas ativos
    $totalEstagiariosAtivos = \App\Models\Estagiario::where('status', 'Ativo')->count();
    $totalSupervisores = \App\Models\Supervisor::count(); 
    $totalDepartamentos = \App\Models\Departamento::count(); // se tiver tabela
    $totalEncerrados = \App\Models\Estagiario::where('status', 'Encerrado')->count();

    return view('welcome', compact(
        'estagiarios', 
        'totalEstagiariosAtivos', 
        'totalSupervisores',
        'totalDepartamentos',
        'totalEncerrados'
    ));
}

}