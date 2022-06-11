<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipamento;
use App\Models\Funcionario;
use App\Models\tipo_equipamento;
use App\Http\Requests\EquipamentoFormRequest;

class EquipamentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $equipamentos = Equipamento::paginate(10);
        $tipo_equipamento = tipo_equipamento::all();
        $colaboradores = Funcionario::All();
        $tipo = 'todos';

        return view('equipamentos/index', ['equipamentos' => $equipamentos,
            'tipo_equipamentos' => $tipo_equipamento, 'tipo' => $tipo, 'colaboradores' => $colaboradores]);

    }

    public function buscarPorTipo() {

        $tipo = request('tipo_equipamento') ?? 'todos';
        $colaboradores = Funcionario::All();
        $tipo_equipamento = tipo_equipamento::all();

        $equipamentos = Equipamento::where([
            ['tipo_equipamento_id', '=', $tipo]
        ])->paginate(10);

        if($equipamentos) {
            return view('equipamentos/index', ['equipamentos' => $equipamentos, 
                'tipo_equipamentos' => $tipo_equipamento, 'tipo' => $tipo, 'colaboradores' => $colaboradores]);
        }

        $equipamentos = Equipamento::paginate(10);

        return view('equipamentos/index', ['equipamentos' => $equipamentos,
            'tipo_equipamentos' => $tipo_equipamento, 'colaboradores' => $colaboradores]);
    }

    public function buscarPorValorPesquisado() {
        $search = request('search');
        $tipo = '';

        $tipo_equipamento = tipo_equipamento::all();
        $colaboradores = Funcionario::All();

        $equipamentos = Equipamento::where([
            ['fabricante', 'like', '%'.$search.'%']
        ])->orWhere([
            ['modelo', 'like', '%'.$search.'%']
        ])->orWhere([
            ['status', $search]
        ])->orWhere([
            ['numero_patrimonio', 'like', '%'.$search.'%']
        ])->paginate(10);

        if($equipamentos) {
            return view('equipamentos/index', ['equipamentos' => $equipamentos,
                'tipo_equipamentos' => $tipo_equipamento, 'tipo' => $tipo, 'colaboradores' => $colaboradores]);
        }   

        $equipamentos = Equipamento::paginate(10);

        return view('equipamentos/index', ['equipamentos' => $equipamentos,
            'tipo_equipamentos' => $tipo_equipamento, 'tipo' => $tipo, 'colaboradores' => $colaboradores]);
        
    }

    public function show($id) {

        $equipamento = Equipamento::find($id);

        $id_equipamento = $equipamento->tipo_equipamento_id;

        $tipo_equipamento = tipo_equipamento::where([
            ['id', 'like', '%'.$id_equipamento.'%']
        ])->first();

        return view('equipamentos/show', ['equipamento' => $equipamento, 'tipo_equipamento' => $tipo_equipamento]);

    }

    public function cadastro() {

        $tipo_equipamentos = tipo_equipamento::all();

        return view('equipamentos/add', ['tipo_equipamentos' => $tipo_equipamentos]);

    }

    public function edit($id) {

        $equipamento = Equipamento::find($id);

        if($equipamento) {

            $id_equipamento = $equipamento->tipo_equipamento_id;
    
            $tipo_equipamento = tipo_equipamento::where([
                ['id', 'like', '%'.$id_equipamento.'%']
            ])->first();
    
            $tipo_equipamentos = tipo_equipamento::all();
            
        }


        return view('equipamentos/add', ['equipamento' => $equipamento, 'tipo_equipamentos' => $tipo_equipamentos, 'tipo_equipamento' => $tipo_equipamento]);
    }

    public function destroy($id) {

        $equipamento = Equipamento::find($id);
        $equipamento->delete();

        return redirect()->route('equipamentos');
    }

    public function cadastroEquipamento(EquipamentoFormRequest $request) {
        //Pega os dados do Post feito pelo form da dela de Add funcionário
        Equipamento::create($request->all());

        //Notifica que deu Certo
        return redirect()->route('equipamentos')
        ->with('status', 'Equipamento cadastrado com sucesso.');
    }

    public function alterarEquipamento(EquipamentoFormRequest $request, $id) {

        $equipamento = Equipamento::find($id);

        $equipamento->tipo_equipamento_id = $request->tipo_equipamento_id;
        $equipamento->modelo = $request->modelo;
        $equipamento->fabricante = $request->fabricante;
        $equipamento->numero_serie = $request->numero_serie;
        $equipamento->numero_patrimonio = $request->numero_patrimonio;
        $equipamento->cpu = $request->cpu;
        $equipamento->memoria_ram = $request->memoria_ram;
        $equipamento->valor = $request->valor;
        $equipamento->valor_atual = $request->valor_atual;
        $equipamento->data_compra = $request->data_compra;

        $equipamento->save();

        //Notifica que deu Certo
        return redirect()->route('equipamentos')
        ->with('status', 'Equipamento editado com sucesso.');
    }
}
