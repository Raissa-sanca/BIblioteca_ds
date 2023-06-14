<?php
require_once '../controladoras/UtilizadorController.php';
require_once '../controladoras/ReservaController.php';
$accao = $_POST["accao"];
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
    echo $utilizador."<br>";
     echo $data."<br>";
      echo $hora."<br>";
       echo $numeroPessoas."<br>";
    $reservaController->reservarEspaco($utilizador, $data, $hora, $numeroPessoas);
}
