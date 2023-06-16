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
$sql = "SELECT livros.titulo, livros.autor, emprestimos.livro_id
FROM emprestimos
INNER JOIN utilizadores ON emprestimos.utilizador_id = utilizadores.email
INNER JOIN livros ON emprestimos.livro_id = livros.id;";
// Executa a consulta SQL
$result = $conexao->query($sql);
?>
<link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
<!-- Incluindo o jQuery, necessário para o Bootstrap -->
<script src="../../node_modules/jquery/dist/jquery.min.js"></script>
<!-- Incluindo o Popper.js, necessário para o Bootstrap -->
<script src="../../node_modules/popper.js/dist/umd/popper.min.js"></script>
<!-- Incluindo os arquivos JavaScript do Bootstrap -->
<script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../../styles/index.css">
<title>Reservar lIVRO</title>
<?php
include_once "menu.php";
?>
<div class="container">
    <h3>Livros Emprestados</h3>
    <form action="../../servidor/servidor.php" method="POST">
        <table class="table">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Açcão</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row["titulo"]; ?></td>
                        <td><?php echo $row["autor"] ?></td>
                        <td>
                            <input type="hidden" name="id_livro" value="<?php echo $row["livro_id"]; ?>">
                            <input type="hidden" name="accao" value="disponibilidadeLivro">
                            <button type="submit" class="btn btn-primary">Devolver</button>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
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
<?php if (isset($_SESSION['devolucao']) && $_SESSION['devolucao']) : ?>
    <div class="modal fade" id="meuModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Mensagem</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo $_SESSION["devolucao"]; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<script>
    $(document).ready(function() {
        <?php if (isset($_SESSION['devolucao'])) : ?>
            $('#meuModal').modal('show');
        <?php endif; ?>
        <?php unset($_SESSION['devolucao']); ?>
    });
    $('#fecharModal').click(function() {
        $('#meuModal').modal('hide');
    });
</script>