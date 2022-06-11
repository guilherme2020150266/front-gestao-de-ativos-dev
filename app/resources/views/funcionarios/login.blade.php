<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>JC | Login</title>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="icon" href="/img/JC.png">
    <script src="https://kit.fontawesome.com/78eaa2cf68.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/funcionario/index.js"></script>

</head>
    <body style="background-color: #086099;">

    <div class="col-12 d-flex justify-content-center">
        <div class="col-5" style="margin-top: 15%;">
            <div class="card" style="border-radius: 45px;">
                <div class="card-body">
                    <div class="d-flex justify-content-center pr-0"> 
                        <img src="img/JC.png" style="width: auto; height: 300px;">
                        <div class="col-md-6 ml-4">
                            <h4 class="card-title text-center mt-5 mb-4">Controle de Ativos</h4>
                            <input type="text" class="form-control form-control-lg mb-3" name="login" id="login" placeholder="Login">
                            <input type="password" class="form-control form-control-lg mb-4" name="senha" id="senha" placeholder="Senha">
                            <div class="d-flex justify-content-center">
                                <a type="submit" href="/funcionario" class="btn btn-danger btn-lg px-5 mb-2 ">Entrar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </body>
</html>