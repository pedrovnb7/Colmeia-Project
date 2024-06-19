<?php include('protect.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <title>Colmeia Home </title>
</head>
<body>
<div class="container">
    <header id="header">
        <div class="menu">
            <img src="assets/img/logo.png" class="logo" alt="Logo">
        </div>
        <div class="logout">
            <a href="logout.php"><i class="bi bi-box-arrow-right"></i></a>
        </div>
    </header>
    <div class="row">

        <div class="col-md-3">
            <div class="card">
                <img class="campanha" src="assets/img/camp.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Campanhas</h5>
                    <p class="card-text"></p>
                    <div class="options">
                        <a href="campanhaco.php" class="button">Entrar</a>
                    </div>
                </div>
            </div>
        </div>

        <!--2 card-->
        <div class="col-md-3">
            <div class="card">
                <img class="desafio" src="assets/img/v.o.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Vitrine de oportunidades</h5>
                    <p class="card-text"></p>
                    <div class="options">
                        <a href="vitrineco.php" class="button">Entrar</a>
                    </div>
                </div>
            </div>
        </div>

        <!--3 card-->
        <div class="col-md-3">
            <div class="card">
                <img class="desafio" src="assets/img/avali.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Avaliação 360</h5>
                    <p class="card-text"></p>
                    <div class="options">
                        <a href="pesquisar_avaliar_usuarios_co.php" class="button">Entrar</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php require "footer.php"; ?>
</div>
</body>
</html>
