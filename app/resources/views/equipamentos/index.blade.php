@extends('layouts.main')

@section('title', 'JC | Equipamentos')

@section('content')

<div class="container">
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show mt-4 mb-0" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="form-inline mt-4">
        <a class="form-inline align-items-center text-decoration-none my-4" href="{{ url()->previous() }}">
            <i class="fa-solid fa-arrow-left text-danger fa-xl mr-2 ml-4"></i>
            <h5 class="mb-0 text-danger">LISTA DE EQUIPAMENTOS</h5>
        </a>
    </div>
    <div class="form-inline mb-2">
        <form action="/equipamentos/search" method="GET">
            <input class="form-control mr-3" style="width: 450px;" type="text" name="search" placeholder="Pesquisar Equipamento">
        </form>
        <a class="text-decoration-none" href="/equipamentos/add">
            <button class="btn btn-danger d-flex align-items-center">
                <i class="material-icons mr-2">
                    add_to_queue
                </i>    
                CADASTRAR EQUIPAMENTOS
            </button>
        </a>

        <button class="btn btn-danger ml-3 d-flex align-items-center" class="btn btn-primary" data-toggle="modal" data-target="#tipo-equipamento-modal"> 
            <i class="material-icons mr-2">
            devices
            </i>
            CADASTRAR TIPO EQUIPAMENTO
        </button>

    </div>
    <div class="form-inline" id="lista-tipo-equipamentos">
        <form action="/equipamentos" class="mt-3" method="get">
            @if($tipo == 'todos')
            <button class="btn text-danger border-danger mr-3" disabled>TODOS</button>
            @else
            <button class="btn text-dark border-dark mr-3">TODOS</button>
            @endif
        </form>
        @foreach($tipo_equipamentos ?? '' as $func)
        <form action="/equipamentos/tipo" class="mt-3" method="GET">
            @if($tipo !== 'todos')
                @if($func->id == $tipo)
                <button class="btn text-danger border-danger mr-3 text-uppercase" disabled type="submit"
                    name="tipo_equipamento" value={{ $func->id }}>{{ $func->nome }}</button>
                @else
                <button class="btn text-dark border-dark mr-3 text-uppercase" type="submit" name="tipo_equipamento"
                    value={{ $func->id }}>{{ $func->nome }}</button>
                @endif
            @else
            <button class="btn text-dark border-dark mr-3 text-uppercase" type="submit"name="tipo_equipamento"
                value={{ $func->id }}>{{ $func->nome }}
            </button>
            @endif
        </form>
        @endforeach
    </div>
    <br>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Patrimonio</th>
                    <th>Modelo</th>
                    <th>Fabricante</th>
                    <th>Status</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach($equipamentos ?? [] as $func)
                <tr class="table" id="colunas">
                    <td>{{ $func->id }}</td>
                    <td scope="row">{{ $func->numero_patrimonio }}</td>
                    <td>{{ $func->modelo }}</td>
                    <td>{{ $func->fabricante }}</td>
  
                        @if($func->status == "disponivel")
                        <td class="text-success text-capitalize status-{{ $func->id }}">{{ $func->status }}</td>
                        @else
                        <td class="text-danger text-capitalize status-{{ $func->id }}">{{ $func->status }}</td>
                        @endif
        
                    <td class="form-inline">
                        <a class="mr-2 text-decoration-none" href="{{url("equipamentos/$func->id/show")}}">
                            <button class="btn btn-sm btn-warning"><i class="fas fa-user-alt"></i></button>
                        </a>
                        <a class="mr-2 text-decoration-none" href="{{url("equipamentos/$func->id/edit")}}">
                            <button class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></button> 
                        </a>
                        <form action="{{ route('delete_equipamento', ['id' => $func->id])}}" id="form-delete" method="POST">
                            @csrf
                            <button class="btn btn-danger btn-sm mr-2" name="remove_levels" id="btn-del" data-toggle="modal">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                        @if($func->status == "disponivel")
                        <button class="button-{{ $func->id }} btn-equipamento btn btn-success btn-sm" id="btn-equipamento" data-id='{{$func->id}}' data-target="#solicitar-equipamento" class="trigger-btn" data-toggle="modal">
                            <i class="fas fa-laptop-house"></i>
                        </button>
                        @else
                        <button class="button-{{ $func->id }} btn-equipamento btn btn-secondary btn-sm" id="btn-equipamento" data-id='{{$func->id}}' data-target="#cancelar-solicitacao" class="trigger-btn" data-toggle="modal">
                            <i class="fas fa-laptop-house"></i>
                        </button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {!! $equipamentos->links() !!}
</div>

<!-- Modal -->
<div class="modal fade" id="tipo-equipamento-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="modal-content" id="form-equipamento">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastro Tipo Equipamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <span>Nome do Tipo de equipamento:</span>
        <input class="form-control mr-3 mt-2" type="text" id="novo-tipo-equipamento" placeholder="Nome">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success" name="add-tipo-equipamento" id="btn-salvar-equipamento">Cadastrar</button>
        <button type="button" class="btn btn-success" disabled id="btn-aguarde-equipamento">Cadastrar</button>
      </div>
    </form> 
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="solicitar-equipamento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registar Movimentação</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <span>Nome do colaborador:</span>
        <select class="custom-select mr-3 mt-2" id="select-solicitar-equipamento">
            <option selected>Selecione Colaborador</option>
            @foreach($colaboradores ?? [] as $colab)
                <option value='{{ $colab->id }}'>{{ $colab->nome }}</option>
            @endforeach
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" name="btn-solicitar-equipamento">Cadastrar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal HTML -->
<div id="cancelar-solicitacao" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header flex-column">
                <h4 class="modal-title w-100">Registro de Devolução<h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Deseja realmente realizar essa operação?</p>
            </div>
            <div class="modal-footer justify-content-center">
            <button class="btn btn-danger btn-sm" id="deletar-solicitacao">
                    Sim
            </button>
            <button type="button" id="cancel" class="btn btn-secondary" data-dismiss="modal">
                    Não
            </button>
            </div>
        </div>
    </div>
</div>
@endsection