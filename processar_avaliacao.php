<?php
include('protect.php');
require "conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuarioId = $_POST['usuario_id'];
    $rating = isset($_POST['rating']) ? $_POST['rating'] : null;

    // Verifica se alguma estrela foi clicada
    if ($rating !== null) {
        $sql = "INSERT INTO avaliacoes (usuario_id, rating) VALUES (:usuario_id, :rating)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':usuario_id', $usuarioId, PDO::PARAM_INT);
        $stmt->bindParam(':rating', $rating, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("Location: pesquisar_avaliar_usuarios.php?success=1");
        } else {
            header("Location: pesquisar_avaliar_usuarios.php?error=1");
        }
    } else {

        header("Location: index.php");
    }
    exit();
}
?>
