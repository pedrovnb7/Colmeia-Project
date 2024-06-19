<?php
include('protect.php');
require "conn.php";

// Verifica se foi fornecido um ID válido
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: listar_usuarios.php");
    exit();
}

// Recupera o ID do usuário da URL
$usuario_id = $_GET['id'];

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Exclui o usuário do banco de dados
    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
    $stmt->bindParam(':id', $usuario_id);
    $stmt->execute();

    // Redireciona para a página de listagem de usuários após a exclusão
    header("Location: listar_usuarios.php");
    exit();
}

// Obtém as informações do usuário do banco de dados
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
$stmt->bindParam(':id', $usuario_id);
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

// Verifica se o usuário foi encontrado
if (!$usuario) {
    header("Location: listar_usuarios.php");
    exit();
}

// Exibir o formulário de confirmação de exclusão
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/usuarios.css">
    <title>Excluir Usuário</title>
</head>
<body>
<header id="header">
    <div class="menu">
        <a href="index.php" class="back-home"><i class="bi bi-arrow-left-circle"></i></a>
        <img src="assets/img/logo.png" class="logo" alt="Logo">
        <a href="listar_usuarios.php" class="listagem"><i class="bi bi-list"></i></a>
    </div>
</header>
<div class="container">
    <h1>Excluir Usuário</h1>
    <p class="message">Tem certeza que deseja excluir o usuário <?= $usuario['nome']; ?>?</p>
    <form method="post" class="form">
        <input type="submit" value="Sim" class="button">
        <a href="listar_usuarios.php" class="button">Não</a>
    </form>
</div>
</body>
</html>
