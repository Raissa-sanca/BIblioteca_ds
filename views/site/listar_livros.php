<?php
session_start();
$base_de_dados = 'biblioteca';
$usuario = 'root';
$senha = '';
$host = 'localhost';
$conexao = new mysqli($host, $usuario, $senha, $base_de_dados);
if ($conexao->connect_error) {
    die("Erro ao conectar com Base de Dados: " . $conexao->connect_error);
}
$sql = "SELECT autor, editora, id, data_publicacao, titulo FROM livros";
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Listar livros</title>

</head>

<body>
    <?php
    include_once 'menu.php';
    ?>
    <h2 class="text-danger text-center">Reservar Livro</h2>
    <div class="d-flex justify-content-center">
        <form action="#" method="POST" id="form">
            <div class="container mt-4">
                <h2>Lista dos Livros</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Autor</th>
                            <th>Editora</th>
                            <th>Data de Publicacao</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()){ ?>
                            <tr>
                                <td><?php echo $row["titulo"]; ?></td>
                                <td><?php echo $row["autor"]; ?></td>
                                <td><?php echo $row["editora"]; ?></td>
                                <td><?php echo $row["data_publicacao"]; ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal<?php echo $row["id"]; ?>">Edit</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    <input type="hidden" name="accao" value="apagarLivro">
                                    <input type="hidden" name="idLivro" value="<?php echo $row["id"]; ?>">
                                </td>
                            </tr>
                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal<?php echo $row["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?php echo $row["id"]; ?>" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel<?php echo $row["id"]; ?>">Edit User</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="formulario" action="../../servidor/servidor.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                                <div class="form-group">
                                                    <label for="editora">T&iacute;tulo</label>
                                                    <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $row["titulo"]; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="autor">Autor</label>
                                                    <input type="text" class="form-control" id="autor" name="autor" value="<?php echo $row["autor"]; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="editora">Editora</label>
                                                    <input type="text" class="form-control" id="editora" name="editora" value="<?php echo $row["editora"]; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="data">Data de Publicacao</label>
                                                    <input type="date" class="form-control" id="data" name="data" value="<?php echo $row["data_publicacao"]; ?>">
                                                </div>
                                                <button id="editar" type="submit" class="btn btn-primary" onclick="botaoClic()">Salvar alterações</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
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
    <?php if (isset($_SESSION['apagado']) && $_SESSION['apagado']) : ?>
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
                        <p><?php echo $_SESSION["apagado"]; ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="fecharModal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- Modal -->
    <?php if (isset($_SESSION['livroEditado']) && $_SESSION['livroEditado']) : ?>
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
                        <p><?php echo $_SESSION["livroEditado"]; ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="fecharModal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <script>
    <?php echo "APAGADo ". $_SESSION["apagado"]."<br>";
    echo "livroEditado ". $_SESSION["livroEditado"]."<br>";
    ?>
        $(document).ready(function() {
            $("#meuModal").modal("show");
            $("#fecharModal").click(function() {
                <?php $_SESSION["apagado"] = "";?>
                <?php $_SESSION["livroEditado"] = "";?>
                $("#meuModal").modal("hide");
            });
        });
        function botaoClic() {
            document.getElementById("formulario").action = "../../servidor/servidor.php?edit=true";
            document.getElementById("formulario").submit();
        }
    </script>
</body>
</html>
