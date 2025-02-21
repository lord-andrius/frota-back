<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoVeiculo extends Model
{
    //
    protected $table = "tipoveiculo";
    protected $fillable = [
        'id',
        'moitvo',
        'ativo',
    ];

}
