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
    <title>Index</title>
</head>

<body>
    <?php
    include_once 'menu.php';
    ?>
    <img src="../../assets/library-488690_1920.jpg" class="img-fluid w-100 mb-4" style="width: 100%; height: auto;">

    <div style="width: 100%; height: 20%;">
        <img src="../../assets/books-2596809_1920.jpg" class="img-fluid p-5" style="height: 400px; width: 100%;" alt="...">
    </div>

    <div class="bg-danger text-light text-center fw-bolder">
        <div>
            <img src="../../assets/icons8-facebook-novo-48.png" alt="">
            <img src="../../assets/icons8-instagram-48.png" alt="">
        </div>
        <div class="p-2">
            Term of use. Privacy Policy
        </div>
    </div>
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <!-- Incluindo o Popper.js, necessário para o Bootstrap -->
    <script src="../../node_modules/popper.js/dist/umd/popper.min.js"></script>

    <!-- Incluindo os arquivos JavaScript do Bootstrap -->
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>