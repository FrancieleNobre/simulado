<?php
session_start();

if (isset($_SESSION["nome"]) and (isset($_SESSION['email']))) {
    $nome = $_SESSION["nome"];
    $email = $_SESSION["email"];
} else {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
}

?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SAEP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-secondary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><?php echo $nome; ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- <li class="nav-item">
                        <a class="nav-link imgf" href="dashboard.php?page=cliente" style="font-size: 20px;"><i class="bi bi-person" style="font-size: 30px;"></i> Cliente</a>
                    </li> -->
                </ul>
                <form class="d-flex" role="search">
                    <a href="logout.php" class="btn btn-outline-danger">Sair</a>
                </form>
            </div>
        </div>
    </nav>

    <center>
        <a class="btn btn-secondary mt-4" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
            Opções
        </a>
    </center>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel"><?php echo $nome; ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
                <center>
                <ul class="list-group">
                    <li class="list-group-item"><a href="dashboard.php?page=agencia">Agência</a></li>
                    <li class="list-group-item"><a href="dashboard.php?page=veiculo">Veículo</a></li>
                </ul>
                </center>
            </div>
        </div>
    </div>

    <div class="container-fluid text-light " style="margin-top: 60px;">
        <?php

        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $page = $_GET['page'];

            if ($page == 'agencia') {
                include_once 'agencia.php';
            } else if ($page == 'veiculo') {
                include_once 'veiculo.php';
            } else {

                echo '<div class="position-absolute top-50 start-50 translate-middle p-4 text-dark border border-secondary">
            <center><i class="bi bi-ban"></i> Página não encontrada</h1></center>
      </div>';
            }
        } else {
            echo '<div class="position-absolute top-50 start-50 translate-middle p-4 text-dark border border-dark col-6 fs-1">
            <center><i class="bi bi-gear"></i> Página Administrativa</center>
      </div>';
        }
        ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>