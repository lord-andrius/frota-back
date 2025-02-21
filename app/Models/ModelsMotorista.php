<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelsMotorista extends Model
{
    protected $table = 'motorista';
    protected $primaryKey = 'cnh';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'cnh',
        'nome',
        'vencimento',
        'celular',
        'ativo'
    ];

}
