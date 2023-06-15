<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav justify-content-center">
                <a class="nav-link active" aria-current="page" href="./index.php">Página Inicial</a>
                <a class="nav-link" href="./reserva.php">Reservas</a>
                <a class="nav-link" href="listar_livros.php">Listar Livros</a>
                <a class="nav-link" href="reservar_livro.php">Reservar Livro</a>
                <a class="nav-link" href="devolucao.php">Devolução</a>
                <?php
                if (isset($_SESSION["utilizador"]) && isset($_SESSION["role"])) {
                    if (intval($_SESSION["role"]) === 1) {
                ?>
                 <a class="nav-link" href="adicionarLivro.php">Adicionar Livro</a>
                        <a class="nav-link" href="criar_conta.php">Criar conta</a>
                <?php
                    }
                }
                ?>
                <a class="nav-link" href="./ajuda.php">Ajuda</a>
                <a class="nav-link" href="./contacto.php">Contacto</a>
                <a class="nav-link" href="logout.php">Sair</a>
            </div>
        </div>
    </div>
</nav>