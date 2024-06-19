<?php include('protect.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/register.css">
    <title>Cadastro de Usuário</title>
</head>
<body>
<div class="container">
<header id="header">
    <div class="menu">
        <a href="index.php" class="back-home"><i class="bi bi-arrow-left-circle"></i></a>
        <img src="assets/img/logo.png" class="logo" alt="Logo">
        <a href="listar_usuarios.php" class="listagem"><i class="bi bi-list"></i></a>
    </div>
</header>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center;">Cadastro de Usuário</h5>
                    <form action="register_process.php" method="post">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Função</label>
                            <select class="form-control" id="role" name="role" required>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <button type="submit" class="button">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require "footer.php"; ?>
</div>
</body>
</html>
