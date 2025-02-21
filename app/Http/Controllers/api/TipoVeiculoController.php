<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\TipoVeiculo;

class TipoVeiculoController
{
    public function index()
    {
        $query = TipoVeiculo::query();
        $query->where('ativo', '=', true);
        return $query->get();
    }

   
    public function store(Request $request)
    {
        $novo_tipo = new TipoVeiculo();
        $novo_tipo->tipo = $request->string('tipo');
        $novo_tipo->save();
    }

    
    public function show(string $id)
    {
        $query = TipoVeiculo::query();
        $query->where('ativo', '=', true);
        $query->where('id', '=', $id);
        return $query->get();
    }

        
    public function update(Request $request, string $id)
    {
        $tipo = TipoVeiculo::findOrFail($id);
        $tipo->tipo = $request->string('tipo');
        $tipo->save();
    }

    
    public function destroy(string $id)
    {
        $tipo = TipoVeiculo::findOrFail($id);
        $tipo->ativo = false;
        $tipo->save();
    }
}
