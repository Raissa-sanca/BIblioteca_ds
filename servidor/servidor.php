<?php
include_once "../controllers/UtilizadorController.php";
include_once "../controllers/ReservaController.php";
include_once "../controllers/EmprestimoController.php";
$accao = $_POST["accao"];
if(isset($_POST["action"])){
    $action = $_POST["action"];
}
if ($accao === 'autenticar') {
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $utilizadorController = new UtilizadorController();
    $utilizadorController->autenticar($email, $senha);
} else if ($accao === "criarConta") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $utilizadorController = new UtilizadorController();
    $utilizadorController->create($nome, $email, $senha);
} else if ($accao === "reservar") {
    $reservaController = new ReservaController();
    $utilizador = $_SESSION["utilizador"];
    $data = $_POST["data"];
    $hora = $_POST["hora"];
    $numeroPessoas = $_POST["numeroPessoas"];
    $reservaController->reservarEspaco($utilizador, $data, $hora, $numeroPessoas);
}else if($accao === "salvarLivro"){
        $ec = new EmprestimoController();
        $utilizador = $_SESSION['utilizador'];
        $idLivro = $_POST["livro"];
        $dataDevolucao = $_POST['data_devolucao'];
        $ec->registarEmprestimo($utilizador, $idLivro, $dataDevolucao);
}else if($accao === "disponibilidadeLivro"){
    $idLivro = $_POST["id_livro"];
    $lc = new LivroController();
    $ec = new EmprestimoController();
    $lc->updateDisponibilidade($idLivro, 1);
    $ec->deletarEmprestimo($idLivro);
}else if($accao === "apagarLivro"){
    $lc = new LivroController();
    $idLivro = $_POST["idLivro"];
    echo $idLivro;
    $lc->removerLivroId($idLivro);
}else if($accao === "cadastrarLivro"){
    $lc = new LivroController();
    $titulo = $_POST["titulo"];
    $autor = $_POST["autor"];
    $editora = $_POST["editora"];
    $data_publicacao = $_POST["data_publicacao"];
    $lc->cadastrar($titulo, $autor, $editora, $data_publicacao, 1);

}