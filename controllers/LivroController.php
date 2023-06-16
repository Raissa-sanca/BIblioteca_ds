<?php
include_once '../models/Livros.php';
session_start();
class LivroController{
    public function listaLivros(): array
    {
        $livros = new Livros();
        return $livros->all();
    }
    public function updateDisponibilidade($livro_id, $disponivel){
        $livro = new Livros();
        $livro::find_by_sql("UPDATE livros SET disponivel = '$disponivel' WHERE id = '$livro_id'");
    }
    public function removerLivroId($id_livro){
        $livro = new Livros();
       $livro::find_by_sql("DELETE FROM LIVROS WHERE ID = '$id_livro'");
       $_SESSION["apagado"] = "LIVRO apagado com Sucesso!";
        header("location: ../views/site/listar_livros.php");
        exit;
    }
    public function cadastrar($titulo, $autor, $editora, $data_publicacao, $disponivel){
        $livro = new Livros();
        $livro->titulo = $titulo;
        $livro->autor = $autor;
        $livro->editora = $editora;
        $livro->data_publicacao = $data_publicacao;
        $livro->disponivel = $disponivel;
        if ($livro->save()) {
            $_SESSION["cadastrarLivro"] = "Livro Cadastrado com Sucesso!";
            header("Location: ../views/site/adicionarLivro.php");
            exit;
        } else {
            $_SESSION["cadastrarLivro"] = "Erro ao Cadastrar Livro!";
            header("Location: ../views/site/adicionarLivro.php");
            exit;
        }
    }
    public function editarLivro($titulo, $autor, $editora, $data_publicacao, $livro_id){
        $livro = new Livros();
        $livro::find_by_sql("UPDATE LIVROS SET titulo='$titulo', autor='$autor', editora='$editora',
         data_publicacao='$data_publicacao' WHERE id='$livro_id'");
        $_SESSION["livroEditado"] = "Livro Editado com Sucesso";
        header("Location: ../views/site/listar_livros.php");
        exit;

    }
}