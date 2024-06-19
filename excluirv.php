<?php
require "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM vagas WHERE id = :id");
    $stmt->bindParam(':id', $id);
    
    if ($stmt->execute()) {
        header("Location: vitrine.php");
        exit();
    } else {
        echo "Erro ao excluir a vaga";
    }
} else {
    header("Location: vitrine.php");
    exit();
}
?>
