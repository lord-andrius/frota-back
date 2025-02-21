<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TipoVeiculo;

class Veiculo extends Model
{
    //
    protected $table = 'veiculo';
    protected $primaryKey = 'placa';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'placa',
        'tipo',
        'anoDeFabricacao',
        'cor',
        'rodagemAquisicao',
        'cargaMaxima',
        'ativo',
    ];

    public function tipo(): HasOne {
        return $this->hasOne(TipoVeiculo);
    }

}
