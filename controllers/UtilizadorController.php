<?php

use Symfony\Component\VarDumper\VarDumper;

session_start();

include_once '../models/Utilizadores.php';

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
                header("Location: ../views/site/index.php");
                exit;
            } else {
                $mensagem = "Ocorreu um erro ao cadastrar o utilizador";
            }
        }
        $_SESSION["criarConta"] = $mensagem;
        header("Location: ../views/site/criar_conta.php");
        exit;
    }

    public function autenticar($email, $password) {
        $base_de_dados='biblioteca';
        $usuario='root';
        $senha = '';
        $host = 'localhost';
        $conexao = new mysqli($host, $usuario, $senha, $base_de_dados);
        if ($conexao->connect_error) {
            die("Erro ao conectar com Base de Dados: " . $conexao->connect_error);
        }
        $sql = "SELECT email, senha, role_id FROM utilizadores WHERE email = '$email' AND senha = '$password'";
        $result = $conexao->query($sql);
        $role = 0;
        while ($row = $result->fetch_assoc()) {
           $role = $row["role_id"];
        }
    
        if (empty($result)) {
            $_SESSION["autenticar"] = "Erro! utilizador ou senha inválido";
           header("Location:../views/site/index.php");
        } else if($role === 0){
            $_SESSION["autenticar"] = "Erro! utilizador ou senha inválido";
            header("Location:../views/site/index.php");
        }else{
            $_SESSION["utilizador"] = $email;
            $_SESSION["role"] = $role;
            header("Location:../views/site/home.php");
        }
    }
    public function  allUtilizador(){
        $utilizadores = new Utilizadores();
        $utilizadores::all();
    }

}



