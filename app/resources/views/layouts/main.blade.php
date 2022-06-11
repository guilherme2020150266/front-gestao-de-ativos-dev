<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Dados da Aba -->
    <title>@yield('title')</title>
    <link rel="icon" href="/img/JC.png">

    <!-- Fonte padrão -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">

    <!-- Icones -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://kit.fontawesome.com/78eaa2cf68.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"
        integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.js"
        integrity="sha512-Lii3WMtgA0C0qmmkdCpsG0Gjr6M0ajRyQRQSbTF6BsrVh/nhZdHpVZ76iMIPvQwz1eoXC3DmAg9K51qT5/dEVg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #086099;">
        <div class="col-12 d-flex justify-content-between align-items-center">

            <img src="../../img/JC.png" style="width: auto; height: 60px;">
            <ul class="navbar-nav mr-auto mt-2 ml-4 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Página inicial</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/colaborador">Colaboradores</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/equipamentos">Equipamentos</a>
                </li>
            </ul>
            <div class="dropdown open">

                <button class="btn btn-unstyled text-white ' dropdown-toggle" type="button" id="triggerId"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle text-white fa-2xl mr-2 text-white"></i>{{ Auth::user()->name }}
                </button>

                <div class="dropdown-menu dropdown-menu-right" style="width: 50px !important;"
                    aria-labelledby="triggerId">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>

        </div>


        </div>
    </nav>
    @yield('content')

    <!-- Modal HTML -->
    <div id="confirm" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header flex-column">
                    <div class="icon-box">
                        <i class="material-icons">&#xE5CD;</i>
                    </div>
                    <h4 class="modal-title w-100">Confirmar Delete</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente apagar este registro?</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button class="btn btn-danger btn-sm" id="delete">
                        Sim
                    </button>
                    <button type="button" id="cancel" class="btn btn-secondary" data-dismiss="modal">
                        Não
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- JavaScript -->

<script src="/js/jquery.js"></script>
<script src="/js/jquery.maskinput.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/scripts.js"></script>
<script src="/js/manutencao/index.js"></script>
<script src="/js/equipamento/index.js"></script>
<script src="/js/funcionario/index.js"></script>
<script src="/js/movimentacao/index.js"></script>

</html>