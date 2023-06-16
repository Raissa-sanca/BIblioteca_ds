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
    <div style="width: 100%; height: 20%;" class="d-flex justify-content-center p-4 mt-4">
        <div>
            <h3>Contacte-nos</h3>
            <h6>R. Camilo Castelo Branco 6</h6>
            <h6>5300-106, Bragança</h6>
            <h6>raissasanca@gmail.com</h6>
            <h6>953425264</h6>
        </div>
        <div class="ms-4 w-50">
            <div class="mb-3 d-flex gap-2">
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nome" style="width: 250px;">
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="E-mail" style="width: 250px;">
            </div>
            <div class="mb-3 d-flex gap-2">
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Telefone" style="width: 250px;">
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Morada" style="width: 250px;">
            </div>
            <div class="mb-3">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Mensagem" style="width: 510px;"></textarea>
              </div>
            <div class="mt-2 d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" style="width: 150px;">Enviar</button>
            </div>
        </div>
    </div>

    <div class="bg-danger fixed-bottom text-light text-center fw-bolder" style="height: 100px;">
        <div>
            <img src="../../icons8-facebook-novo-48.png" alt="">
            <img src="../../icons8-instagram-48.png" alt="">
        </div>
        <div class="p-2">
            Term of use. Privacy Policy
        </div>
    </div>


        <!-- Modal -->
        <?php if (isset($_SESSION['contacto']) && $_SESSION['contacto']) : ?>
        <div class="modal fade" id="meuModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Mensagem</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo $_SESSION["contacto"]; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</body>
<script>
    $(document).ready(function() {
        <?php if (isset($_SESSION['contacto'])) : ?>
            $('#meuModal').modal('show');
        <?php endif; ?>
        <?php unset($_SESSION['contacto']); ?>
    });
    $('#fecharModal').click(function() {
        $('#meuModal').modal('hide');
    });
</script>
</html>