<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
        <!-- Incluindo o jQuery, necessário para o Bootstrap -->
        <script src="node_modules/jquery/dist/jquery.min.js"></script>
        <!-- Incluindo o Popper.js, necessário para o Bootstrap -->
        <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
        <!-- Incluindo os arquivos JavaScript do Bootstrap -->
        <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="./styles/index.css">
        <title>Ajuda</title>
    </head>

    <body>
        <?php
        include_once 'menu.php';
        ?>
        <div class="p-5 m-5" style="border-radius: 6px; background-color: lightgrey;">
            <h4 class="text_success text-center">
                Perguntas Frequentes</h4>
            <p> Como adquirir um cartão da biblioteca?</p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque
            faucibusquis metus hendrerit pulvinar. Vivamus a neque turpis. Nulla justo
            sapien,mollis ac nunc vitae, efficitur pretium nibh.

            <p>Quantos livros posso  reservar?</p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque
            faucibusquis metus hendrerit pulvinar. Vivamus a neque turpis. Nulla justo
            sapien,mollis ac nunc vitae, efficitur pretium nibh.
            <p> Consequências por atraso de devolução?</p>

        </div>

        <div class="bg-danger fixed-bottom text-light text-center fw-bolder">
            <div>
                <img src="./assets/icons8-facebook-novo-48.png" alt="">
                <img src="./assets/icons8-instagram-48.png" alt="">
            </div>
            <div class="p-2">
                Term of use. Privacy Policy
            </div>
        </div>
    </body>

</html>