<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $table = 'documentos';

    protected $fillable = [
        'estagiario_id',
        'tipo',
        'ficheiro',
    ];

  
    public function estagiario()
    {
        return $this->belongsTo(Estagiario::class);
    }
}
