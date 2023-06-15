<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- Incluindo o jQuery, necessário para o Bootstrap -->
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <!-- Incluindo o Popper.js, necessário para o Bootstrap -->
    <script src="../../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <!-- Incluindo os arquivos JavaScript do Bootstrap -->
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../styles/index.css">
    <title>Cadastro de Livro</title>
</head>

<body>
    <?php
    include_once "./menu.php";
    ?>
    <div class="container">
        <h2 class="mt-4">Cadastro de Livro</h2>
        <form action="../../servidor/servidor.php" method="POST">
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="form-group">
                <label for="autor">Autor:</label>
                <input type="text" class="form-control" id="autor" name="autor" required>
            </div>
            <div class="form-group">
                <label for="editora">Editora:</label>
                <input type="text" class="form-control" id="editora" name="editora" required>
            </div>
            <div class="form-group">
                <label for="data_publicacao">Data de Publicação:</label>
                <input type="date" class="form-control" id="data_publicacao" name="data_publicacao" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <input type="hidden" name="accao" value="cadastrarLivro">
        </form>
    </div>

    <div class="bg-danger fixed-bottom text-light text-center fw-bolder">
        <div>
            <img src="../../assets/icons8-facebook-novo-48.png" alt="">
            <img src="../../assets/icons8-instagram-48.png" alt="">
        </div>
        <div class="p-2">
            Term of use. Privacy Policy
        </div>
    </div>
</body>
<?php if (isset($_SESSION['cadastrarLivro']) && $_SESSION['cadastrarLivro']) : ?>
    <div id="meuModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Mensagem do Modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><?php echo $_SESSION["cadastrarLivro"]; ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary">Fechar</button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<script>
    $(document).ready(function() {
        <?php if (isset($_SESSION['cadastrarLivro'])) : ?>
            $('#meuModal').modal('show');
        <?php endif; ?>
        <?php unset($_SESSION['cadastrarLivro']); ?>
    });
    $('#fecharModal').click(function() {
        $('#meuModal').modal('hide');
    });
</script>

</html>