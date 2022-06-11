@extends('layouts.main')

@section('title', 'JC | Dashboard ')

@section('content')
@if (session('status'))
<div class="alert alert-success alert-dismissible fade show mt-4 mb-0" role="alert">
    {{ session('status') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<!-- Alertas de sucesso e erro da manutenção -->
<div class="alert alert-success alert-dismissible fade show mt-4 mb-0" id="sucess-manutencao" role="alert">
    Manutenção cadastrada com sucesso!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="alert alert-danger alert-dismissible fade show mt-4 mb-0" id="error-manutencao" role="alert">
    Erro ao cadastrar a mantutenção.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<h2 class="text-center m-4">Controle de Ativos</h2>
<div class="border-primary container mb-4">
    <div class="row border border-dark rounded">
        <div class="col-sm">
            <div class="card border-0">
                <div class="card-body">
                    <h3 class="card-title">Equipamentos Disponíveis</h3>
                    <div class="col">
                        <canvas id="myChart" width="100" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card border-0">
                <div class="card-body">
                    <h3>Movimentação</h3>
                    <button class="btn btn-info btn-lg px-5 mb-2 btn-block" data-toggle="modal"
                        data-target="#nova-manutencao" style="margin-top: 5%; font-size: 18px;"><i
                            class="fa-solid fa-user-plus"></i> Manutenção </button>
                    <h3>Colaboradores</h3>
                    <a href="/colaborador/add" class="btn btn-info btn-lg px-5 mb-2 btn-block"
                        style="margin-top: 5%; font-size: 18px;"><i class="fa-solid fa-user-plus"></i> Cadastrar
                        Colaborador</a>
                    <a href="/colaborador" class="btn btn-danger btn-lg px-5 mb-2 btn-block" style="font-size: 18px;"><i
                            class="fas fa-list"></i> Lista de Colaboradores</a>
                    <h3>Equipamentos</h3>
                    <a href="/equipamentos/add" class="btn btn-info btn-lg px-5 mb-2 btn-block"
                        style="margin-top: 5%; font-size: 18px;"><i class="fa-solid fa-computer"></i> Cadastrar
                        Equipamento</a>
                    <a href="/equipamentos" class="btn btn-danger btn-lg px-5 mb-2 btn-block" style="font-size: 18px;"><i
                            class="fas fa-list"></i> Lista de Equipamento</a>
                    <!--   <h3>Relatórios</h3>
                    <a href="/" class="btn bg-secondary btn-lg border border-dark px-5 mb-2 text-white btn-block"
                        style="margin-top: 5%; font-size: 18px;"><i class="fas fa-calendar-week"></i> Relatório Semanal</a>
                    <a href="/" class="btn bg-secondary btn-lg border border-dark px-5 mb-2 text-white btn-block"
                        style="font-size: 18px;"><i class="fa-solid fa-calendar-days"></i> Relatório Mensal</a> -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="nova-manutencao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" id="form-manu">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar Manutenção</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span>Patrimônio do Equipamento:</span>
                <input class="form-control mr-3 mt-2" type="text" id="valor-patrimonio">
            </div>
            <div class="modal-body">
                <span>Matrícula do Funcionário:</span>
                <input class="form-control mr-3 mt-2" type="text" id="matricula-funcionario">
            </div>
            <div class="modal-body">
                <span>Técnico:</span>
                <input class="form-control mr-3 mt-2" type="text" id="nome-tecnico">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" id="btn-salvar">Cadastrar</button>
                <button type="button" class="btn btn-success" disabled id="btn-aguarde">Cadastrar</button>
            </div>
        </form>
    </div>
</div>

<script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Indisponíveis', 'Disponíveis'],
        datasets: [{
            label: '# of Votes',
            data: [{{$equipamentosIndisponiveis}}, {{$equipamentosDisponiveis}}],
            backgroundColor: [
                'rgba(226, 0, 25)',
                'rgba(8, 96, 153)',
            ],
            borderColor: [
                'rgba(226, 0, 25, 1)',
                'rgba(8, 96, 153)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

@endsection