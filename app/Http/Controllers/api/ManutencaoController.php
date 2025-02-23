<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\Manutencao;

class ManutencaoController
{
    public function index()
    {
        $query = Manutencao::query();
        $query->where('manutencao.ativo', '=', true);
        $query->join('veiculo', 'veiculo.placa', "=", "manutencao.placa");
        $query->join('motivoDefeito', 'motivoDefeito.id', "=", "manutencao.motivoDefeito");
        return $query->get(['manutencao.id','data','veiculo.placa as veiculo', 'iluminacao', 'eletrica', 'motor', 'freios', 'lataria', 'vidros', 'pneus', 'orcamento', 'motivoDefeito.motivo', 'observacao', 'manutencao.ativo', 'motivoDefeito.id as motivoid']);
    }

    public function store(Request $request)
    {
        $nova_manutencao = new Manutencao();
        $nova_manutencao->data = $request->date('data');
        $nova_manutencao->placa = $request->string('placa');
        $nova_manutencao->iluminacao = $request->boolean('iluminacao');
        $nova_manutencao->eletrica = $request->boolean('eletrica');
        $nova_manutencao->motor = $request->boolean('motor');
        $nova_manutencao->embreagem = $request->boolean('embreagem');
        $nova_manutencao->freios = $request->boolean('freios');
        $nova_manutencao->lataria = $request->boolean('lataria');
        $nova_manutencao->vidros = $request->boolean('vidros');
        $nova_manutencao->pneus = $request->boolean('pneus');
        $nova_manutencao->orcamento = $request->float('orcamento');
        $nova_manutencao->motivoDefeito =  $request->integer('motivoDefeito');
        $nova_manutencao->observacao = $request->string('observacao');
        $nova_manutencao->save();
    }

    public function show(string $id)
    {
        $query = Manutencao::query();
        $query->where('manutencao.ativo', '=', true);
        $query->where('manutencao.id', '=', $id);
        $query->join('veiculo', 'veiculo.placa', "=", "manutencao.placa");
        $query->join('motivoDefeito', 'motivoDefeito.id', "=", "manutencao.motivoDefeito");
        return $query->get(['manutencao.id','data','veiculo.placa as veiculo', 'iluminacao', 'eletrica', 'motor', 'freios', 'lataria', 'vidros', 'pneus', 'orcamento', 'motivoDefeito.motivo', 'observacao', 'manutencao.ativo', 'motivoDefeito.id as motivoid']);
    }

    
    public function update(Request $request, string $id)
    {
        $manutencao = Manutencao::findOrFail($id);
        $manutencao->data = $request->date('data');
        $manutencao->placa = $request->string('placa');
        $manutencao->iluminacao = $request->boolean('iluminacao');
        $manutencao->eletrica = $request->boolean('eletrica');
        $manutencao->motor = $request->boolean('motor');
        $manutencao->embreagem = $request->boolean('embreagem');
        $manutencao->freios = $request->boolean('freios');
        $manutencao->lataria = $request->boolean('lataria');
        $manutencao->vidros = $request->boolean('vidros');
        $manutencao->pneus = $request->boolean('pneus');
        $manutencao->orcamento = $request->float('orcamento');
        $manutencao->motivoDefeito =  $request->integer('motivoDefeito');
        $manutencao->observacao = $request->string('observacao');
        $manutencao->save();
    }

    
    public function destroy(string $id)
    {
        $manutencao = Manutencao::findOrFail($id);
        $manutencao->ativo = false;
        $manutencao->save();
    }
}
