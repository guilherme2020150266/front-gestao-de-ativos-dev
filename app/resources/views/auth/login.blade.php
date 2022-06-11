<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>JC | Login</title>

    <link rel="icon" href="/img/JC.png">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <script src="/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/78eaa2cf68.js" crossorigin="anonymous"></script>
</head>

<body style="background-color: #086099;">

    <div class="col-12 d-flex justify-content-center" style="margin-top: 14%;"><!-- Alinhar Card no Centro -->
            <div class="col-xl-6"><!-- Tamanho do card -->
                <div class="card" style="border-radius: 45px;">
                    <div class="card-body row pr-0">
                        <div class="col-5 mr-4 d-flex justify-content-center">
                            <img style="height:100%; max-height: 220px;" src="img/JC.png">
                        </div>
                        <div class="col-5 mr-3"> 
                            <div class="d-flex justify-content-center ">
                                <h4 class="card-title text-center mt-2 mb-4">Controle de Ativos</h4>
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                               
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                                        </div>
                                        <input id="email" type="email" placeholder="Email" aria-describedby="inputGroupPrepend" class="form-control @error('email') is-invalid @enderror " name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                               
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></div>
                                        </div>
                                        <input id="password" type="password" placeholder="Senha" aria-describedby="inputGroupPrepend" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                               

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-danger btn-lg px-5 mb-2 ">Entrar</button>
                                </div>
                            </form>
                                                
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>