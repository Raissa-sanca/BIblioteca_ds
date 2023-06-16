<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../styles/index.css">

    <!-- Incluindo o jQuery, necessário para o Bootstrap -->
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <!-- Incluindo o Popper.js, necessário para o Bootstrap -->
    <script src="../../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <!-- Incluindo os arquivos JavaScript do Bootstrap -->
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <title>Criar conta</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light menu">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav justify-content-center">
                    <a class="nav-link active" aria-current="page" href="#">P&aacute;gina Inicial</a>
                </div>
    </nav>
    <div style="width: 100%; height: 20%;" class="d-flex justify-content-center">
        <div class="p-5 w-50">
            <form action="../../servidor/servidor.php" method="POST">
                <div class="mb-3">
                    <input type="text" name="nome" class="form-control" id="exampleFormControlInput1" placeholder="Nome" style="width: 350px;" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="E-mail" style="width: 350px;" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="senha" class="form-control" id="exampleFormControlInput1" placeholder="Palavra passe" style="width: 350px;" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Repita palavra passe" style="width: 350px;" required=</div>
                    <br>
                    <div class="mb-3">
                        <p>J&aacute; possui conta? <a href="./index.php">Entrar</a> </p>
                    </div>
                    <button type="submit" class="btn btn-success" style="width: 150px;">Criar</button>
                </div>

                <input type="hidden" name="accao" value="criarConta">
            </form>
        </div>

    <!-- Modal -->
    <?php if (isset($_SESSION['criarConta']) && $_SESSION['criarConta']) : ?>
        <div class="modal fade" id="meuModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Mensagem</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo $_SESSION["criarConta"]; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

        <div class="bg-danger fixed-bottom text-light text-center fw-bolder">
            <div>
                <img src="../../assets/icons8-facebook-novo-48.png" alt="">
                <img src="../../assets/icons8-instagram-48.png" alt="">
            </div>
            <div class="p-2">
                Term of use. Privacy Policy
            </div>
        </div>
        <script>
            $(document).ready(function() {
                <?php if (isset($_SESSION['criarConta'])) : ?>
                    $('#meuModal').modal('show');
                <?php endif; ?>
                <?php unset($_SESSION['criarConta']); ?>
            });
            $('#fecharModal').click(function() {
                $('#meuModal').modal('hide');
            });
        </script>
</body>

</html>