<?php
include_once '../modelos/Reservas.php';
session_start();
class ReservaController {

    public function reservarEspaco($utilizador, $data, $hora, $numeroPessoas) {
        $reserva = new Reservas();
        $reserva->utilizador_id = $utilizador;
        $reserva->num_pessoas = $numeroPessoas;
        $reserva->data_reserva = $data;
        $reserva->hora = $hora;

        if ($reserva->save()) {
            $_SESSION["mensagem"] = "Reserva Feita com Sucesso";
            header("location: ../reserva.php");
            exit;
        } else {
            $_SESSION["mensagem"] = "Ocorreu um erro ao Efectuar uma reserva";
            header("location: ../reserva.php");
            exit;
        }
    }
}
