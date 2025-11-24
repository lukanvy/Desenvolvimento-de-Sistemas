<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estagiario extends Model
{
    use HasFactory;

    protected $table = 'estagiarios';

    protected $fillable = [
        'nome_completo',
        'curso',
        'ano',
        'bi',
        'email',
        'telefone',
        'data_inicio',
        'data_fim',
        'observacoes',
        'carta',
        'status',
        'supervisor_id',
        'departamento_id',
        'reparticao_id',
    ];

   
   public function supervisor()
{
    return $this->belongsTo(Supervisor::class, 'supervisor_id');
}


    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

   
    public function reparticao()
    {
        return $this->belongsTo(Reparticao::class);
    }

    
    public function avaliacoes()
    {
        return $this->hasMany(Avaliacao::class);
    }

   
    public function documentos()
    {
        return $this->hasMany(Documento::class);
    }

    public function curso() { return $this->belongsTo(Curso::class); }

}
