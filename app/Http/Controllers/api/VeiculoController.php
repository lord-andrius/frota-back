<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\Veiculo;

class VeiculoController
{
    public function index()
    {
        $query = Veiculo::query();
        $query->where('veiculo.ativo', '=', true);
        $query->join('tipoveiculo', 'veiculo.tipo', '=', 'tipoveiculo.id');
        $resultado = $query->get(['placa', 'tipoveiculo.tipo', 'anoDeFabricacao', 'cor', 'rodagemAquisicao', 'cargaMaxima']);

        foreach ($resultado as $key => $value) {
            $totalKmViajado = 0; // NOTA: melhore isso quando tiver a tabela de viagem
            $resultado[$key]['rodagemAtual'] = $value['rodagemAquisicao'] + $totalKmViajado;
            $totalManutencao = 0; // NOTA: melhore isso quando tiver a tabela de viagem
            $resultado[$key]['totalManutencao'] =  $totalManutencao;
        }

        unset($value);
        return $resultado;
    }

    

    public function store(Request $request)
    {
        $novo_veiculo = new Veiculo();
        $novo_veiculo->placa = $request->string('placa');
        $novo_veiculo->tipo = $request->integer('tipo');
        $novo_veiculo->anoDeFabricacao = $request->integer('anoDeFabricacao');
        $novo_veiculo->cor = $request->string('cor');
        $novo_veiculo->rodagemAquisicao = $request->integer('rodagemAquisicao');
        $novo_veiculo->cargaMaxima = $request->integer('cargaMaxima');
        $novo_veiculo->save();

    }

    public function show(string $placa)
    {
        $query = Veiculo::query();
        $query->where('veiculo.ativo', '=', true);
        $query->where('placa', '=', $placa);
        $query->join('tipoveiculo', 'veiculo.tipo', '=', 'tipoveiculo.id');
        $resultado = $query->get(['placa', 'tipoveiculo.tipo', 'anoDeFabricacao', 'cor', 'rodagemAquisicao', 'cargaMaxima']);

        foreach ($resultado as $key => $value) {
            $totalKmViajado = 0; // NOTA: melhore isso quando tiver a tabela de viagem
            $resultado[$key]['rodagemAtual'] = $value['rodagemAquisicao'] + $totalKmViajado;
            $totalManutencao = 0; // NOTA: melhore isso quando tiver a tabela de viagem
            $resultado[$key]['totalManutencao'] =  $totalManutencao;
        }

        unset($value);

        return $resultado;
    }

    public function update(Request $request, string $placa)
    {
        $veiculo = Veiculo::findOrFail($placa);
        $veiculo->tipo = $request->integer('tipo');
        $veiculo->anoDeFabricacao = $request->integer('anoDeFabricacao');
        $veiculo->cor = $request->string('cor');
        $veiculo->rodagemAquisicao = $request->integer('rodagemAquisicao');
        $veiculo->cargaMaxima = $request->integer('cargaMaxima');
        $veiculo->save();

    }

    
    public function destroy(string $id)
    {
        $veiculo = Veiculo::findOrFail($placa);
        $veiculo->ativo = false;
        $veiculo->save();
    }
}
