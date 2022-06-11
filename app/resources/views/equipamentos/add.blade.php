@extends('layouts.main')

@section('title', 'JC | Cadastro Equipamento')

@section('content')
<div class="container-fluid p-5">

    @if($status = Session::get('mensagem'))
    <h2>{{ $status }}</h2>
    @endif

    <div class="col-12 d-flex justify-content-center">
        <div class="col-5">
            <div class="card border border-primary" style="border-radius: 45px;">
                <div class="card-body">
                    <a class="form-inline align-items-center text-decoration-none my-4" href="{{ url()->previous() }}">
                        <i class="fa-solid fa-arrow-left text-danger fa-xl mr-2 ml-4"></i>
                        <h5 class="mb-0 text-danger">@if(isset($equipamento)) EDITAR @else ADICIONAR @endif EQUIPAMENTO
                        </h5>
                    </a>
                    <div class="d-flex justify-content-center pr-0">
                        @if(isset($equipamento))
                        <form method="post" action="/alterEquipamento/{{$equipamento->id}}">
                            @else
                            <form action="/createEquipamento" method="post">
                                @endif
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="modelo" id="modelo"
                                            placeholder="Modelo" value={{$equipamento->modelo ?? old('modelo')}}>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="fabricante" id="fabricante"
                                            placeholder="Fabricante" value={{$equipamento->fabricante ?? old('fabricante')}}>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <select class="form-control" id="tipo_equipamento_id"
                                            name="tipo_equipamento_id">
                                            @if (!old('tipo_equipamento_id'))
                                            <option selected value={{$tipo_equipamento->id ?? old('tipo_equipamento_id')}}>
                                                {{$tipo_equipamento->nome ?? 'Escolha o Tipo'}}
                                            </option>
                                            @endif
                                            @foreach($tipo_equipamentos ?? '' as $func)
                                                @if (old('tipo_equipamento_id') && old('tipo_equipamento_id') == $func->id)
                                                <option selected value={{$func->id}}>
                                                    {{$func->nome}}
                                                </option>
                                                @endif
                                            <option value={{ $func->id }}>{{ $func->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="date" class="form-control" name="data_compra" id="data_compra"
                                            placeholder="Data da Compra" value={{$equipamento->data_compra ?? old('data_compra')}}>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="numero_serie" id="numero_serie"
                                            placeholder="Número de Série" value={{$equipamento->numero_serie ?? old('numero_serie')}}>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="numero_patrimonio"
                                            id="numero_patrimonio" placeholder="Número de Patrimônio"
                                            value={{$equipamento->numero_patrimonio ?? old('numero_patrimonio')}}>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="cpu" id="cpu" placeholder="CPU"
                                            value={{$equipamento->cpu ?? old('cpu')}}>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="memoria_ram" id="memoria_ram"
                                            placeholder="Memória RAM" value={{$equipamento->memoria_ram ?? old('memoria_ram')}}>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="valor" id="valor"
                                            placeholder="Valor" value={{$equipamento->valor ?? ''}}>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="valor_atual" id="valor_atual"
                                            placeholder="Valor Atual" value={{$equipamento->valor_atual ?? old('valor_atual')}}>
                                    </div>
                                </div>
                                @if ($errors->any())
                                <ul class="mt-2">
                                    @foreach ($errors->all() as $error)
                                    <li class="text-danger">{{ $error }}</li>
                                    @endforeach
                                </ul>
                                @endif
                                <form class="form-delete" action="">
                                    <div class="d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn btn-danger btn-lg px-4">@if(isset($equipamento))
                                            EDITAR @else CADASTRAR @endif</button>
                                    </div>
                                </form>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(".form-delete").submit(function(e) {
    e.preventDefault();

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        }
    })
})
</script>
@endsection