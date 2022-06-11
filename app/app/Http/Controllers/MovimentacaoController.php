<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movimentacao;

class MovimentacaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

    }

    public function registrarMovimentacao(Request $request) {

        if($request->tipo_movimentacao == "entrada") {

        } else {

        };

    }
}
