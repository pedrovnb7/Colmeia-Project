<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    die("Você precisa se conectar para poder acessar a página.<p><a href=\"login.php\">Conectar</a></p>");
}
?>

