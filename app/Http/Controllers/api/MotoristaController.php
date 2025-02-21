<?php


namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\ModelsMotorista;

class MotoristaController
{
    public function index()
    {
        $query = ModelsMotorista::query();
        $query->where('ativo', '=', true);
        return $query->get();
    }

    
    public function store(Request $request)
    {
        $novo_motorista = new ModelsMotorista();
        $novo_motorista->cnh = $request->all()['cnh'];
        $novo_motorista->nome = $request->all()['nome'];
        $novo_motorista->vencimento = $request->date('vencimento');
        $novo_motorista->celular = $request->string('celular');
        $novo_motorista->save();
    }

    public function show(string $cnh)
    {
        return ModelsMotorista::findOrFail($cnh);
    }

    
    
    public function update(Request $request, string $cnh)
    {
        $motorista = ModelsMotorista::findOrFail($cnh);
        $motorista->update($request->all());
    }

    public function destroy(string $cnh)
    {
        $motorista = ModelsMotorista::findOrFail($cnh);
        $motorista->ativo = false;
        $motorista->save();
    }
}
