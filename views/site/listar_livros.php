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
        <form action="../../servidor/servidor.php" method="POST">
            <div class="container mt-4">
                <h2>List of Books</h2>
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

                        <?php while ($row = $result->fetch_assoc()) : ?>
                            <tr>
                                <td><?php echo $row["titulo"]; ?></td>
                                <td><?php echo $row["autor"]; ?></td>
                                <td><?php echo $row["editora"]; ?></td>
                                <td><?php echo $row["data_publicacao"]; ?></td>
                                <td>

                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">Edit</button>

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
                                            <form action="update.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                                <div class="form-group">
                                                    <label for="nome">Autor</label>
                                                    <input type="text" class="form-control" id="autor" name="autor" value="<?php echo $row["autor"]; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Editora</label>
                                                    <input type="text" class="form-control" id="email" name="editora" value="<?php echo $row["editora"]; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="senha">Data de Publicacao</label>
                                                    <input type="text" class="form-control" id="senha" name="data" value="<?php echo $row["data_publicacao"]; ?>">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </tbody>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
    <!-- Modal -->
    <?php if (isset($_SESSION['devolucao']) && $_SESSION['devolucao']) : ?>
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
                        <p><?php echo $_SESSION["devolucao"]; ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary">Fechar</button>
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
                        <button type="button" class="btn btn-secondary">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</body>

<script>
    $(document).ready(function() {
        <?php if (isset($_SESSION['apagado'])) : ?>
            $('#meuModal').modal('show');
        <?php endif; ?>
        <?php unset($_SESSION['apagado']); ?>
    });
    $('#fecharModal').click(function() {
        $('#meuModal').modal('hide');
    });
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function openEditModal(id) {
        $('#editModal' + id).modal('show');
    }
</script>

</html>