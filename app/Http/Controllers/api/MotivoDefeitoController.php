<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\MotivoDefeito;

class MotivoDefeitoController
{
 
    public function index()
    {
        $query = MotivoDefeito::query();
        $query->where('ativo', '=', true);
        return $query->get();
    }

    public function show(string $id)
    {
        return MotivoDefeito::findOrFail($id);
    }
   
    public function store(Request $request)
    {
        $novo_motivo = new MotivoDefeito();
        $novo_motivo->motivo = $request->string('motivo');
        $novo_motivo->save();
    }

    
    public function update(Request $request, string $id)
    {
        $motivo = MotivoDefeito::findOrFail($id);
        $motivo->motivo = $request->string('motivo');
        $motivo->save();
    }


    public function destroy(string $id)
    {
        $motivo = MotivoDefeito::findOrFail($id);
        $motivo->ativo = false;
        $motivo->save();

    }
}
