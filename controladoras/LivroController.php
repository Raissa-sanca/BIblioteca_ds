<?php
include_once '../modelos/Reservas.php';
class LivroController{
    public function listarLivro(){
        $livros = new Livros();
        return $livros->all();
    }
}