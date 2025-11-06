<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    protected $table = 'avaliacoes';

    protected $fillable = [
        'estagiario_id',
        'pontualidade',
        'qualidade_trabalho',
        'colaboracao',
        'iniciativa',
        'classificacao',
        'comentario',
        'relatorio',
    ];

   
    public function estagiario()
    {
        return $this->belongsTo(Estagiario::class);
    }
}
