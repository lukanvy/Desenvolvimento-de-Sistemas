<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    use HasFactory;

    protected $table = 'supervisores';

    protected $fillable = [
        'codigo',
        'nome',
        'cargo',
        'area_formacao',
        'area_atuacao',
        'tarefas',
        'reparticao_id',
    ];

    public function reparticao()
    {
        return $this->belongsTo(Reparticao::class);
    }

  
    public function estagiarios()
    {
        return $this->hasMany(Estagiario::class);
    }

   
    public function avaliacoes()
    {
        return $this->hasMany(Avaliacao::class);
    }
}
