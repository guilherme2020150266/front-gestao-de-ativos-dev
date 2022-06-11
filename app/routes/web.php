<?php


use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//
Route::post('/solicitar',[ApiController::class,'solicitarEquipamento']);
Route::post('/cancelar_solicitacao',[ApiController::class,'cancelarSolicitacao']);

Route::get('/login',[FuncionarioController::class,'login']);

Route::post('/manutencao',[ApiController::class,'registrarManutencao']);

Route::get('/',[DashboardController::class,'index']);

Route::get('/equipamentos',[EquipamentoController::class,'index'])->name('equipamentos');
Route::get('/equipamentos/search',[EquipamentoController::class,'buscarPorValorPesquisado']);
Route::get('/equipamentos/tipo',[EquipamentoController::class,'buscarPorTipo']);
Route::get('/equipamentos/{id}/show',[EquipamentoController::class,'show']);
Route::get('/equipamentos/{id}/edit',[EquipamentoController::class,'edit']);
Route::post('/equipamentos/{id}/delete',[EquipamentoController::class,'destroy'])->name('delete_equipamento');
Route::get('/equipamentos/add',[EquipamentoController::class,'cadastro']);
Route::post('/createEquipamento',[EquipamentoController::class,'cadastroEquipamento']);
Route::post('/alterEquipamento/{id}',[EquipamentoController::class,'alterarEquipamento']);

Route::get('/colaborador',[FuncionarioController::class,'index'])->name('colaborador');
Route::get('/colaborador/add',[FuncionarioController::class,'create']);
Route::get('/colaborador/{id}/edit', [FuncionarioController::class,'edit']);
Route::post('/createColaborador',[FuncionarioController::class,'store']);
Route::post('/alterColaborador/{id}',[FuncionarioController::class,'save']);
Route::post('/colaborador/{id}/delete',[FuncionarioController::class,'destroy'])->name('delete_funcionario');

Auth::routes(['register' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
