<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipamento;
use App\Models\tipo_equipamento;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        $equipamentosDisponiveis = Equipamento::where([
            ['status', 'like', 'disponivel']
        ])->count();
        
        $equipamentosIndisponiveis = Equipamento::where([
            ['status', 'like', 'indisponivel']
        ])->count();
        
        return view('dashboard/index', ['equipamentosIndisponiveis' => $equipamentosIndisponiveis,
        'equipamentosDisponiveis' => $equipamentosDisponiveis]);
    }
}