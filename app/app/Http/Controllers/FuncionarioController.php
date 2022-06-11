<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Http\Requests\FuncionarioFormRequest;
use App\Http\Requests\FuncionarioEditFormRequest;

class FuncionarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        $search = request('search');

        if($search) {
            $funcionarios = Funcionario::where([
                ['nome', 'like', '%'.$search.'%']
            ])->orWhere([
                ['cargo', 'like', '%'.$search.'%']
            ])->orWhere([
                ['matricula', 'like', '%'.$search.'%']
            ])->orWhere([
                ['cpf', 'like', '%'.$search.'%']
            ])->orWhere([
                ['rg', 'like', '%'.$search.'%']
            ])->paginate(10);
        } else {
            $funcionarios = Funcionario::paginate(10);
        }

        return view('funcionarios/index', ['funcionarios' => $funcionarios]);
    }

    public function edit($id) {

        $funcionario = Funcionario::find($id);

        return view('funcionarios/edit', ['funcionario' => $funcionario]);
    }

    public function destroy($id) {
        $funcionario = Funcionario::find($id);
        
        if($funcionario) {
            $funcionario->delete();
        }

        //Notifica que deu Certo
        return redirect()->route('colaborador')
        ->with('status', 'Colaborador deletado com sucesso.');

    }

    public function save($id, FuncionarioEditFormRequest $request) {
        //Pega os dados do Post feito pelo form da dela de Add funcionário
        $funcionario = Funcionario::find($id);

        $funcionario->nome = $request->nome;
        $funcionario->cargo = $request->cargo;
        $funcionario->email = $request->email;
        $funcionario->matricula = $request->matricula;
        $funcionario->telefone = unMask($request->telefone);
        $funcionario->rg = unMask($request->rg);
        $funcionario->cpf = unMask($request->cpf);

        $funcionario->save();        
        
        //Notifica que deu Certo
        return redirect()->route('colaborador')
        ->with('status', 'Colaborador editado com sucesso.');
        
    }

    // Exibir a tela de Add funcionário
    public function create(){
        return view('funcionarios/add');
    }

    public function login(){
        return view('funcionarios/login');
    }

    public function store(FuncionarioFormRequest $request) {
        //Pega os dados do Post feito pelo form da dela de Add funcionário
        
        Funcionario::create([
        'nome' => $request->nome,
        'cargo' => $request->cargo,
        'email' => $request->email,
        'matricula' => $request->matricula,
        'telefone' =>  unMask($request->telefone),
        'rg' => unMask($request->rg),
        'cpf' => unMask($request->cpf)
        ]);

        //Notifica que deu Certo
        return redirect()->route('colaborador')
        ->with('status', 'Colaborador criado com sucesso.');
    }
}
