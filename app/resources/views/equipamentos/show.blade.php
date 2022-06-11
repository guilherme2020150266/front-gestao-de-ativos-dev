@extends('layouts.main')

@section('title', 'JC | Cadastro Equipamento')

@section('content')
<div class="container-fluid p-5">

    @if($status = Session::get('mensagem'))
    <h2>{{ $status }}</h2>
    @endif

    @if($errors->any())
    <h2>Houve alguns erros ao processar o formulário</h2>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <div class="col-12 d-flex justify-content-center">
        <div class="col-5">
            <div class="card border border-primary" style="border-radius: 45px;">
                <div class="card-body">
                    <a class="form-inline align-items-center text-decoration-none my-4" href="/equipamentos">
                        <i class="fa-solid fa-arrow-left text-danger fa-xl mr-2 ml-4"></i>
                        <h5 class="mb-0 text-danger">DETALHES EQUIPAMENTO</h5>
                    </a>
                    <div class="d-flex justify-content-center pr-0">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" placeholder="Modelo" disabled
                                        value={{$equipamento->modelo}}>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" placeholder="Fabricante" disabled
                                        value={{$equipamento->fabricante}}>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" placeholder="Data da Compra" disabled
                                        value={{$tipo_equipamento->nome}}></input>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="date" class="form-control" placeholder="Data da Compra" disabled
                                        value={{$equipamento->data_compra}}></input>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" placeholder="Número de Série" disabled
                                        value={{$equipamento->numero_serie}}>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" placeholder="Número de Patrimônio" disabled
                                        value={{$equipamento->numero_patrimonio}}>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" placeholder="CPU" disabled
                                        value={{$equipamento->cpu}}>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" placeholder="Memória RAM" disabled
                                        value={{$equipamento->memoria_ram}}>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" placeholder="Valor" disabled
                                        value={{$equipamento->valor}}>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" placeholder="Valor Atual" disabled
                                        value={{$equipamento->valor_atual}}>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection