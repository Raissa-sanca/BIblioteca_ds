<?php

session_start();

include_once '../modelos/Utilizadores.php';

// Controller
class UtilizadorController {

    public function create($nome, $email, $senha) {
        $utilizador = Utilizadores::find_by_sql("SELECT * FROM utilizadores WHERE nome = ? OR email = ?", [$nome, $email]);
        $mensagem = "";

        if (!empty($utilizador)) {
            $mensagem = "Utilizador já está cadastrado";
        } else {
            $utilizador = new Utilizadores();
            $utilizador->nome = $nome;
            $utilizador->email = $email;
            $utilizador->senha = $senha;
            $utilizador->role_id = 2;

            if ($utilizador->save()) {
                header("Location: ../login.php");
                exit;
            } else {
                $mensagem = "Ocorreu um erro ao cadastrar o utilizador";
            }
        }
        $_SESSION["criarConta"] = $mensagem;
        header("Location: ../criar_conta.php");
        exit;
    }

    public function autenticar($email, $password) {
        $utilizador = new Utilizadores();
        $retorno = $utilizador::find_by_sql("SELECT email, senha, role_id FROM utilizadores WHERE email=? AND senha=? LIMIT 1", [$email, $password]);
        if (empty($retorno)) {
            header("Location:../index.php");
        } else {
            $_SESSION["utilizador"] = $email;
            $_SESSION["role"] = $retorno[0]->role_id;
             header("Location:../home.php");
        }
    }

}
