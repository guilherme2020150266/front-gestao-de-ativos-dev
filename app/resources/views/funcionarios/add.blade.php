@extends('layouts.main')

@section('title', 'JC | Cadastro Funcionário')

@section('content')
<div class="container-fluid p-5">

@if($status = Session::get('mensagem'))
  <h2>{{ $status }}</h2>
@endif

<div class="col-12 d-flex justify-content-center">
  <div class="col-5">
    <div class="card border border-primary p-4" style="border-radius: 45px;">
          <div class="card-body">
            <a href="{{ url()->previous() }}" class="form-inline align-items-center text-decoration-none my-4">
              <i class="fa-solid fa-arrow-left text-danger fa-xl mr-2 ml-2"></i>
              <h5 class="mb-0 text-danger">ADICIONAR COLABORADOR</h5>
            </a>
              <div class=""> 
              <form action="/createColaborador" method="post">
              @csrf
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="nome" value="{{ old('nome') }}" id="nome" placeholder="Nome Completo">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="cargo" value="{{ old('cargo') }}"  id="cargo" placeholder="Cargo">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email" placeholder="E-mail">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="mascara-telefone form-control" name="telefone" value="{{ old('telefone') }}" id="telefone" placeholder="Telefone">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <input type="text" class="mascara-rg form-control" name="rg" value="{{ old('rg') }}" id="rg" placeholder="RG">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="mascara-cpf form-control" name="cpf" value="{{ old('cpf') }}" id="cpf" placeholder="CPF">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-12 mb-2">
                    <input type="text" class="form-control" name="matricula" id="matricula" value="{{ old('matricula') }}" placeholder="Matrícula">
                  </div>
                </div>
                @if ($errors->any())
                    <ul class="mt-2">
                        @foreach ($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="d-flex justify-content-center mt-3"> 
                  <button type="submit" id="submit" class="btn btn-danger btn-lg px-4" style="width:200px;">Cadastrar
                  </button>
                </div>
              </form>
              </div>
              </div>
          </div>
      </div>
  </div>
</div>

@endsection