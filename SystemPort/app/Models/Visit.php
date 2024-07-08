<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipVisita',
        'responsavel',
        'autorizado',
        'status',
        'hora_encerramento',
        'dado_id',
        'nome_pessoa', // Adicione o campo nome_pessoa ao fillable
    ];

    public function portaria()
    {
        return $this->belongsTo(Portaria::class, 'dado_id');
    }
}
