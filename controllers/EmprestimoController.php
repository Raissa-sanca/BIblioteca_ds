<?php
include_once "../models/Emprestimos.php";
include_once  "../controllers/LivroController.php";
session_start();
class EmprestimoController
{
public function registarEmprestimo($utilizador_id, $livro_id, $data_devolucao){
    $ec = new Emprestimos();
    $ec->utilizador_id = $utilizador_id;
    $ec->livro_id = $livro_id;
    $ec->data_devolucao = $data_devolucao;
    if($ec->save()){
        $cl = new LivroController();
        $cl->updateDisponibilidade($livro_id, 0);
        $_SESSION["livro_id"] = $livro_id;
        $_SESSION["emprestimoLivro"] = "Empréstimo de Livro Feito com Sucesso";
        header("location:../views/site/reservar_livro.php");
        exit;
    }else{
        $_SESSION["emprestimoLivro"] = "Erro ao fazer Empréstimo de Livro";
        header("location: ../views/site/reservar_livro.php");
        exit;
    }
}
public function deletarEmprestimo($id_livro){
    $ec = new Emprestimos();
    $retorno = $ec::find_by_sql("DELETE FROM EMPRESTIMOS WHERE livro_id = '$id_livro'");
        $_SESSION["devolucao"] = "Devolução de Livro Feita com Sucesso";
        header("location:../views/site/devolucao.php");
        exit;
}
}