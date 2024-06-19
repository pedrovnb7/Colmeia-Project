<?php
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $mysqli->real_escape_string($_POST['nome']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);
    $role = $mysqli->real_escape_string($_POST['role']);

    // Verifica se o email já está cadastrado
    $sql_check = "SELECT * FROM usuarios WHERE email = '$email'";
    $result_check = $mysqli->query($sql_check);

    if ($result_check->num_rows > 0) {
        echo "Email já cadastrado. <a href='register.php'>Tente novamente</a>";
    } else {
        // Insere o novo usuário
        $sql_insert = "INSERT INTO usuarios (nome, email, senha, role) VALUES ('$nome', '$email', '$senha', '$role')";
        if ($mysqli->query($sql_insert)) {
            echo "
            <script>
                alert('Usuário cadastrado com sucesso');
                window.location.href = 'index.php';
            </script>
            ";
            exit;
        } else {
            echo "Erro: " . $mysqli->error;
        }
    }
}
?>
