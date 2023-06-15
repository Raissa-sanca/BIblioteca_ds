<?php
include_once '../models/Reservas.php';
session_start();
class ReservaController {

    public function reservarEspaco($utilizador, $data, $hora, $numeroPessoas) {
        $reserva = new Reservas();
        $reserva->utilizador_id = $utilizador;
        $reserva->data_reserva = $data;
        $reserva->hora = $hora;
        $reserva->num_pessoas = $numeroPessoas;
        if ($reserva->save()) {
            $_SESSION["mensagem"] = "Reserva Feita com Sucesso";
        } else {
            $_SESSION["mensagem"] = "Ocorreu um erro ao Efectuar uma reserva";
        }
        header("location: ../views/site/reserva.php");
        exit;
    }
}
