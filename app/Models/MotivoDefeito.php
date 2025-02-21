<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MotivoDefeito extends Model
{
    protected $table = "motivodefeito";
    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'moitvo',
        'ativo',
    ];


}
