<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparticao extends Model
{
    use HasFactory;

    protected $table = 'reparticoes';

    protected $fillable = [
        'codigo',
        'nome',
        'abreviatura',
        'descricao',
        'departamento_id',
    ];

  
    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

   
    public function supervisores()
    {
        return $this->hasMany(Supervisor::class);
    }

    
    public function estagiarios()
    {
        return $this->hasMany(Estagiario::class);
    }
}
