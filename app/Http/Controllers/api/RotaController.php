<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\Rota;

class RotaController
{
    
    public function index()
    {
        $query = Rota::query();
        $query->where('rota.ativo', '=', true);
        $query->join('veiculo', 'veiculo.placa', '=', 'rota.placa');
        $query->join('motorista', 'motorista.cnh', '=', 'rota.motorista');
        return $query->get(['id', 'data', 'veiculo.placa', 'motorista.nome as motorista', 'origem', 'destino', 'distancia', 'pesoCarga', 'receita', 'combustivel', 'pedagio', 'outros', 'rota.ativo', 'motorista.nome as motoristanome']);
    }

    
    
    public function store(Request $request)
    {
        $nova_rota = new Rota();
        $nova_rota->data = $request->date('data');
        $nova_rota->placa = $request->string('placa');
        $nova_rota->motorista = $request->string('motorista');
        $nova_rota->origem = $request->string('origem');
        $nova_rota->destino = $request->string('destino');
        $nova_rota->distancia = $request->integer('distancia');
        $nova_rota->pesoCarga = $request->integer('pesoCarga');
        $nova_rota->receita = $request->float('receita');
        $nova_rota->combustivel = $request->float('combustivel');
        $nova_rota->pedagio = $request->float('pedagio');
        $nova_rota->outros = $request->float('outros');
        $nova_rota->noPrazo = $request->boolean('noPrazo');
        $nova_rota->save();
    }

    
    public function show(string $id)
    {
        $query = Rota::query();
        $query->where('rota.ativo', '=', true);
        $query->where('id', '=', $id);
        $query->join('veiculo', 'veiculo.placa', '=', 'rota.placa');
        $query->join('motorista', 'motorista.cnh', '=', 'rota.motorista');
        return $query->get(['id', 'data', 'veiculo.placa', 'motorista.nome as motorista', 'origem', 'destino', 'distancia', 'pesoCarga', 'receita', 'combustivel', 'pedagio', 'outros', 'rota.ativo', 'motorista.nomei as motoristanome']);
    }

    
    
    public function update(Request $request, string $id)
    {
        $rota = Rota::findOrFail($id);
        $rota->data = $request->date('data');
        $rota->placa = $request->string('placa');
        $rota->motorista = $request->string('motorista');
        $rota->origem = $request->string('origem');
        $rota->destino = $request->string('destino');
        $rota->distancia = $request->integer('distancia');
        $rota->pesoCarga = $request->integer('pesoCarga');
        $rota->receita = $request->decimal('receita');
        $rota->combustivel = $request->decimal('combustivel');
        $rota->pedagio = $request->decimal('pedagio');
        $rota->outros = $request->decimal('outros');
        $rota->noPrazo = $request->boolean('noPrazo');
        $rota->save();
    }

    
    public function destroy(string $id)
    {
        $rota = Rota::findOrFail($id);
        $rota->save();
    }
}
