<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manutencao extends Model
{
    protected $table = 'manutencao';
    protected $fillables = [
        'data',
        'placa',
        'placa',
        'iluminacao',
        'eletrica',
        'motor',
        'embreagem',
        'freios',
        'lataria',
        'vidros',
        'pneus',
        'orcamento',
        'motivoDefeito',
        'motivoDefeito',
        'observacao',
        'ativo',
    ];
}
