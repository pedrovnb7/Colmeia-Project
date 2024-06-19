<?php include('protect.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/cadastrar2.css">
    <title>Cadastro de Vaga</title>
</head>
<body>
<div class="container">
<header id="header">
    <div class="menu">
        <a href="vitrine.php" class="back-home"><i class="bi bi-arrow-left-circle"></i></a>
        <img src="assets/img/logo.png" class="logo" alt="Logo">
    </div>
</header>

    <div class="row">
    
        <div class="col-md-6">
        <h5 class="card-title" style="text-align: center;">Cadastro Vaga</h5>
            <div class="card">
                <div class="card-body">

                    <form action="cadastrar_actionv.php" method="POST">
                        <div class="form-group">
                            <label for="inputVaga">Título da Vaga:</label>
                            <input type="text" class="form-control" id="inputVaga" name="vaga" required>
                        </div>
                        <div class="form-group">
                            <label for="inputDescriptionv">Descrição</label>
                            <input type="text" class="form-control" id="inputDescriptionv" name="descriptionv" required>
                        </div>
                        <button type="submit" class="button" value="Cadastrar">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require "footer.php"; ?>
</div>
</body>
</html>
