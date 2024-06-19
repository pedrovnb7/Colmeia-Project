<?php
include('protect.php');
require "conn.php";

// Consulta todos os usuários no banco de dados
$sql = "SELECT * FROM usuarios";
$stmt = $pdo->query($sql);
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/usuarios.css">
    <title>Listagem de Usuários</title>
</head>
<body>
<header id="header">
    <div class="menu">
    <a href="index.php" class="logo-container"> <img src="assets/img/logo.png" class="logo" alt="Logo"></a>
    </div>
</header>
<div class="container">
   
    <h1>Listagem de Usuários</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Senha</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= $usuario['id']; ?></td>
                    <td><?= $usuario['nome']; ?></td>
                    <td><?= $usuario['email']; ?></td>
                    <td><?= $usuario['senha']; ?></td>
                    <td>
                        <div class="actions">
                        <a href="editar_usuario.php?id=<?= $usuario['id']; ?>">Editar</a>
                        <a href="excluir_usuario.php?id=<?= $usuario['id']; ?>">Excluir</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
