<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tipo_equipamento;
use App\Models\Equipamento;
use App\Models\Funcionario;
use App\Models\movimentacoes;
use App\Models\Manutencao;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function index(Request $request) {

        $tipo_equipamento = tipo_equipamento::create($request->all());

        return response()->json([
            'data'  => $tipo_equipamento,
        ], 201);
    }

    public function cancelarSolicitacao(Request $request) {
        $equipamentoId = $request->equipamento_id;

        $equipamento = Equipamento::where([
            ['id', '=', $equipamentoId]
        ])->first();

        if(!$equipamento) {
            return response()->json([
                'data'  =>  'error',
            ], 200);
        }
        
        $MovimentacaoRegistrada = movimentacoes::where([['equipamento_id', 1]])->where([['tipo_movimentacao', 1]])
        ->orderBy('id','desc')->first();
        
        if(!$MovimentacaoRegistrada) {
            return response()->json([
                'data'  =>  'error',
            ], 200);
        }

        DB::beginTransaction();

        $equipamento->status = "disponivel";
        $equipamento->save();

        $Movimentacao = new movimentacoes();

        $Movimentacao->equipamento_id = $equipamento->id;
        $Movimentacao->funcionarios_id = $MovimentacaoRegistrada->funcionarios_id;
        $Movimentacao->tipo_movimentacao = 0;
        $Movimentacao->users_id = auth()->user()->id;
        $Movimentacao->save();

        DB::commit();

        return response()->json([
            'data'  => $equipamento,
        ], 201);

    }

    public function solicitarEquipamento(Request $request) {

        $equipamentoId = $request->equipamento_id;
        $funcionarioId = $request->funcionario_id;

        $equipamento = Equipamento::where([
            ['id', '=', $equipamentoId]
        ])->first();

        if(!$equipamento) {
            return response()->json([
                'data'  =>  'error',
            ], 200);
        }

        $colaborador = Funcionario::where([
            ['id', '=', $funcionarioId]
        ])->first();

        if(!$colaborador) {
            return response()->json([
                'data'  =>  'error',
            ], 200);
        }

        DB::beginTransaction();

        $equipamento->status = "indisponivel";
        $equipamento->save();

        $Movimentacao = new movimentacoes();

        $Movimentacao->equipamento_id = $equipamento->id;
        $Movimentacao->funcionarios_id = $colaborador->id;
        $Movimentacao->tipo_movimentacao = 1;
        $Movimentacao->users_id = auth()->user()->id;
        $Movimentacao->save();

        DB::commit();

        return response()->json([
            'asdf'  =>  $equipamento,
            'data'  =>  $Movimentacao,
        ], 201);
        
    }

    public function registrarManutencao(Request $request) {

        $patrimonio = $request->patrimonio;

        $equipamento = Equipamento::where([
            ['numero_patrimonio', $patrimonio]
        ])->first();

        if(!$equipamento) {
            return response()->json([
                'data'  =>  'error',
            ], 200);
        }    

        $funcionario = Funcionario::where([
            ['matricula', $request->matricula]
        ])->first();

        if(!$funcionario) {
            return response()->json([
                'data'  =>  'error',
            ], 200);
        }

        $manutencao = new Manutencao();
        
        $manutencao->funcionario_id = $funcionario->id;
        $manutencao->equipamento_id = $equipamento->id;
        $manutencao->usuario_id = auth()->user()->id;
        $manutencao->tecnico = $request->tecnicoNome ? $request->tecnicoNome : 'help_desk'; 
        $manutencao->save();

        return response()->json([
            'data'  =>  $manutencao,
        ], 201);

    }
}
