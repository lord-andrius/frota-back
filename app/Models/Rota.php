<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Veiculo;
use App\Models\ModelsMotorista;

class Rota extends Model
{
    //
    protected $table = 'rota';

    protected $fillable = [
        'id',
        'data',
        'placa',
        'motorista',
        'origem',
        'destino',
        'distancia',
        'pesoCarga',
        'receita',
        'combustivel',
        'pedagio',
        'outros',
        'noPrazo',
        'ativo',
    ];
    
    public function placa(): HasOne {
        return $this->hasOne(Veiculo);
    }

    public function motorista(): HasOne {
        return $this->hasOne(ModelsMotorista);
    }

}
