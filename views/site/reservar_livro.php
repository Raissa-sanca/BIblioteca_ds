    <?php
    include_once 'menu.php';
    session_start();
    $base_de_dados='biblioteca';
    $usuario='root';
    $senha = '';
    $host = 'localhost';
    $conexao = new mysqli($host, $usuario, $senha, $base_de_dados);
    if ($conexao->connect_error) {
        die("Erro ao conectar com Base de Dados: " . $conexao->connect_error);
    }
    $sql = "SELECT * FROM livros";
    // Executa a consulta SQL
    $result = $conexao->query($sql);
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
    <title>Reservar lIVRO</title>

</head>

<body>
    <h2 class="text-danger text-center">Reservar Livro</h2>
    <div class="d-flex justify-content-center">
        <form action="../../servidor/servidor.php" method="POST">
            <div class="mb-3">
                <label for="livro" class="form-label">Livro:</label>
                    <select class="form-select w-100" name="livro" required>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            if($row["disponivel"] != 0){
                            ?>
                        <option value="<?php echo $row["id"];?>"><?php echo $row["titulo"];?></option>
                        <?php

                            }
                        }
                        ?>
                    </select>
            </div>
            <div class="mb-3">
                <label for="data_devolucao" class="form-label">Data de Devolução:</label>
                <input type="date" class="form-control" id="data_devolucao" name="data_devolucao" required>
            </div>
            <button type="submit" class="btn btn-primary">Reservar</button>
            <input type="hidden" name="accao" value="salvarLivro">
        </form>
    </div>

    <div class="bg-danger fixed-bottom text-light text-center fw-bolder">
        <div>
            <img src="../../assets/icons8-facebook-novo-48.png" alt="">
            <img src="../../assets/icons8-instagram-48.png" alt="">
        </div>
        <div class="p-2">
            Termos de uso. Política de Privacidade
        </div>
    </div>

    <!-- Modal -->
    <?php if (isset($_SESSION['emprestimoLivro']) && $_SESSION['emprestimoLivro']): ?>
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
                        <p><?php echo $_SESSION["emprestimoLivro"]; ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</body>

<script>
    $(document).ready(function () {
        <?php if (isset($_SESSION['emprestimoLivro'])): ?>
        $('#meuModal').modal('show');
        <?php endif; ?>
        <?php unset($_SESSION['emprestimoLivro']); ?>
    });
    $('#fecharModal').click(function () {
        $('#meuModal').modal('hide');
    });
</script>
</html>