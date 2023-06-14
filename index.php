<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- Incluindo o jQuery, necessário para o Bootstrap -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <!-- Incluindo o Popper.js, necessário para o Bootstrap -->
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <!-- Incluindo os arquivos JavaScript do Bootstrap -->
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./styles/index.css">
    <title>Iniciar Sessão</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light menu">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav justify-content-center">
                    <a class="nav-link active" aria-current="page" href="#">Página Inicial</a>
                </div>
            </div>
    </nav>
    <div style="width: 100%; height: 20%;" class="d-flex justify-content-center">
        <form action="servidor/servidor.php" method="POST">
            <h1 class="text-center mt-5">Iniciar Sessão</h1>
            <div class="p-5 w-50">
          
                <div class="mb-2">
                    <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="E-mail" style="width: 450px;">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="exampleFormControlInput1" name="senha" placeholder="Palavra-passe" style="width: 450px;">
                </div>
                <div class="mt-4 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success" style="width: 250px;">Entrar</button>
                </div>
                <input type="hidden" name="accao" value="autenticar"></input>
            </div>
        </form>
    </div>

    <div class="bg-danger fixed-bottom text-light text-center fw-bolder">
        <div>
            <img src="./assets/icons8-facebook-novo-48.png" alt="">
            <img src="./assets/icons8-instagram-48.png" alt="">
        </div>
        <div class="p-2">
            Termos de uso. Política de Privacidade
        </div>
    </div>
</body>

</html>
