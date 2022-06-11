@extends('layouts.main')

@section('title', 'JC | Funcionarios')

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
      <a class="form-inline align-items-center text-decoration-none mr-4 my-4" href="{{ url()->previous() }}" >
            <i class="fa-solid fa-arrow-left text-danger fa-xl mr-2 ml-4"></i>
            <h5 class="mb-0 text-danger">LISTA DE COLABORADORES</h5>
      </a>
    </div>
    <div class="form-inline mb-4">
      <form action="/colaborador" method="GET">
          <input class="form-control mr-4" id="add" style="width: 750px;" type="text" name="search" placeholder="Pesquisar Colaborador">
      </form>
      <a class="btn btn-danger d-flex align-items-center" href="/colaborador/add">
        <i class="material-icons mr-2">group_add</i>  
        CADASTRAR COLABORADOR
      </a>
    </div>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Telefone</th>
            <th scope="col">Opções</th>
          </tr>
        </thead>
        <tbody>
          @foreach($funcionarios as $func)
              <tr>
                <th scope="row">{{$func->id}}</th>
                <td>{{$func->nome}}</td>
                <td>{{$func->email}}</td>
                <td class="mascara-telefone">{{$func->telefone}}</td>
                <td>
                  <div class="form-inline">
                      <a href="#" class="btn btn-warning btn-sm mr-2">
                          <i class="fas fa-user-alt"></i>
                      </a>
                      <a href="/colaborador/{{$func->id}}/edit" class="btn btn-primary btn-sm mr-2">
                          <i class="fas fa-pencil-alt"></i>
                      </a>
                      <form action="{{ route('delete_funcionario', ['id' => $func->id])}}" id="form-delete" method="POST">
                          @csrf
                          <button class="btn btn-danger btn-sm" name="remove_levels" id="btn-del"  href="#myModal" class="trigger-btn" data-toggle="modal">
                              <i class="fas fa-trash-alt"></i>
                          </button>
                      </form>
                  </div>
              </td>
              </tr>
          @endforeach
        </tbody>
      </table>
    </div>
{!! $funcionarios->links() !!}
</div>

@endsection
