<?php
require "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM campanhas WHERE id = :id");
    $stmt->bindParam(':id', $id);
    
    if ($stmt->execute()) {
        header("Location: campanhas.php");
        exit();
    } else {
        echo "Erro ao excluir a campanha";
    }
} else {
    header("Location: campanhas.php");
    exit();
}
?>
