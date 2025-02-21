<?php
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\api\MotoristaController;


Route::apiResource('/motorista', 'App\Http\Controllers\api\MotoristaController');
Route::apiResource('/motivodefeito', 'App\Http\Controllers\api\MotivoDefeitoController');
Route::apiResource('/tipoveiculo', 'App\Http\Controllers\api\TipoVeiculoController');
Route::apiResource('/veiculo', 'App\Http\Controllers\api\VeiculoController');
Route::apiResource('/rota', 'App\Http\Controllers\api\RotaController');
Route::apiResource('/manutencao', 'App\Http\Controllers\api\ManutencaoController');

