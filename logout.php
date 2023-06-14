<?php

    session_destroy();
    // Redireciona para a página login
    header("Location: index.php");
    exit;
