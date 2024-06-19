<?php
$host = "localhost";
$user = "pedro";
$pass = "1234";
$dbname = "colmeiadb";

$mysqli = new mysqli($host, $user, $pass, $dbname);

if ($mysqli->connect_error) {
    die("Falha na conexão: " . $mysqli->connect_error);
}

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $err) {
    echo "Houve um erro no banco de dados: " . $err->getMessage();
    exit;
}
?>
