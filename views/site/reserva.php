<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
        <!-- Incluindo o jQuery, necessário para o Bootstrap -->
        <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
        <!-- Incluindo o Popper.js, necessário para o Bootstrap -->
        <script src="../../node_modules/popper.js/dist/umd/popper.min.js"></script>
        <!-- Incluindo os arquivos JavaScript do Bootstrap -->
        <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../../styles/index.css">
        <title>Reservar</title>
    </head>

    <body>
<?php
        include_once 'menu.php';
?>
        <h3 class="p-2 text-center fw-bolder" style="color: rgb(122, 117, 117);">Reserva</h3>
        <div class="p-4 mt-3" style="background-color: lightgray;">
            <form action="../../servidor/servidor.php" method="POST">
                <div class="d-flex gap-5 justify-content-end">
                    <div class="mb-3">
                        <input type="date" name="data" class="form-control" id="exampleFormControlInput1" style="width: 150px;">
                    </div>
                    <div class="mb-3">
                        <input type="time" name="hora" class="form-control" id="exampleFormControlInput1" placeholder=""style="width: 150px;">
                    </div>
                    <div class="mb-3">
                        <input type="number" name="numeroPessoas" class="form-control" id="exampleFormControlInput1"
                               placeholder="N&uacute;mero de pessoas" style="width: 150px;">
                    </div>
                    <button type="submit" class="btn btn-success" style="width: 150px; height: 35px;">Reservar</button>
                    <input type="hidden" name="accao" value="reservar">
                </div>
            </form>
        </div>
        <div style="width: 100%; height: 20%;" class="d-flex">
            <div>
                <img src="../../assets/books-2596809_1920.jpg" class="img-fluid p-5" style="height: 400px; width: 100%;"
                     alt="...">
            </div>
            <div class="p-5 w-50">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Raissa" style="width: 250px;">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">N&uacute;mero do aluno</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="123456"style="width: 250px;">
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        Nome
                    </label>
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                </div>
                <div class="form-check">
                    <label class="form-check-label" for="flexRadioDefault2">
                        N&uacute;mero do aluno
                    </label>
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                </div>
                <div class="m-5">
                    <button type="button" class="btn btn-success" style="width: 150px;">Procurar</button>
                </div>
            </div>
        </div>

        <div class="bg-danger text-light text-center fw-bolder" style="height: 100px;">
            <div>
                <img src="../../assets/icons8-facebook-novo-48.png" alt="">
                <img src="../../assets/icons8-instagram-48.png" alt="">
            </div>
            <div class="p-2">
                Term of use. Privacy Policy
            </div>
        </div>


        <!-- Modal -->
        <?php
        if (isset($_SESSION['mensagem']) && $_SESSION['mensagem']): ?>
            <div id="meuModal" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Mensagem</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p><?php echo $_SESSION["mensagem"]; ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <script>
            $(document).ready(function () {
<?php if (isset($_SESSION['mensagem'])): ?>
                    $('#meuModal').modal('show');
<?php endif; ?>
<?php unset($_SESSION['mensagem']); ?>
            });
            $('#fecharModal').click(function () {
                $('#meuModal').modal('hide');
            });
        </script>
    </body>

</html>