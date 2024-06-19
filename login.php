<?php
include('conn.php');

if (isset($_POST['email']) && isset($_POST['senha'])) {

    if (strlen($_POST['email']) == 0) {
        echo "Preencha seu email";
    } else if (strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Usando prepared statements para prevenir SQL Injection
        $stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
        $stmt->bind_param("ss", $email, $senha);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $usuario = $result->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['role'] = $usuario['role'];

            if ($usuario['role'] === 'admin') {
                header('Location: index.php');
            } else if ($usuario['role'] === 'user') {
                header('Location: home.php');
            } else {
                echo "Usuário desconhecido";
            }
            exit;

        } else {
            $erro = "Email ou senha inválidos";
        }

        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/log.css">
    <title>Login</title>
</head>
<body>
<div class="container">
    <div class="form-image">
        <img src="assets/img/logo1.png" alt="Logo">
    </div>
    <div class="form">
        <form method="post" action="">
            <div class="form-header">
                <div class="title">
                    <h1>Login</h1>
                </div>
            </div>
            <div class="input-group">
                <div class="input-box">
                    <label for="login">Login</label>
                    <input id="email" type="email" name="email" placeholder="Digite seu login" required>
                </div>
                <div class="input-box">
                    <label for="senha">Senha</label>
                    <input id="senha" type="password" name="senha" placeholder="Digite sua senha" required>
                </div>
            </div>
            <div class="login-button">
                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
