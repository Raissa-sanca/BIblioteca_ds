    <?php
    include_once 'menu.php';
    include_once 'controladoras/LivroController.php';
    $livrosController = new LivroController();
    $retorno = $livrosController->listarLivro();
    foreach ($retorno as $value) {
        echo $value;
    }
    ?>
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
    <title>Reservar lIVRO</title>
</head>

<body>
    <div style="width: 100%; height: 20%;" class="d-flex justify-content-center">
        <form action="servidor/servidor.php" method="POST">
            <div class="mb-3">
                <label for="utilizador_id" class="form-label">ID do Utilizador:</label>
                <input type="text" class="form-control" id="utilizador_id" name="utilizador_id"
                    placeholder="Insira o ID do utilizador">
            </div>
            <div class="mb-3">
                <label for="livro" class="form-label">Livro:</label>
                <input type="text" class="form-control" id="livro" name="livro" placeholder="Insira o nome do livro">
            </div>
            <div class="mb-3">
                <label for="data_emprestimo" class="form-label">Data de Empréstimo:</label>
                <input type="date" class="form-control" id="data_emprestimo" name="data_emprestimo">
            </div>
            <div class="mb-3">
                <label for="data_devolucao" class="form-label">Data de Devolução:</label>
                <input type="date" class="form-control" id="data_devolucao" name="data_devolucao">
            </div>
            <button type="submit" class="btn btn-primary">Adicionar</button>
            <input type="hidden" name="accao" value="servarLivro">
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