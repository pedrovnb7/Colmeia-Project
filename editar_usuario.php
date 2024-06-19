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
    // Recupera os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Atualiza os dados do usuário no banco de dados
    $stmt = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, senha = :senha WHERE id = :id");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':id', $usuario_id);
    $stmt->execute();

    // Redireciona para a página de listagem de usuários após a edição
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

// Exibir o formulário de edição
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/usuarios.css">
    <title>Editar Usuário</title>
</head>
<body>
<header id="header">
    <div class="menu">
    <a href="index.php" class="logo-container"> <img src="assets/img/logo.png" class="logo" alt="Logo"></a>
    </div>
</header>
<div class="container">
    <h1>Editar Usuário</h1>
    <form method="post" class="form">
        <label for="nome" class="form-label">Nome:</label><br>
        <input type="text" id="nome" name="nome" value="<?= $usuario['nome'] ?>" class="form-control"><br>
        <label for="email" class="form-label">Email:</label><br>
        <input type="email" id="email" name="email" value="<?= $usuario['email'] ?>" class="form-control"><br>
        <label for="senha" class="form-label">Senha</label><br>
        <input type="senha" id="senha" name="senha" value="<?= $usuario['senha'] ?>" class="form-control"><br>
        <button type="submit" class="submit">Salvar</button>
    </form>
</div>
</body>
</html>
