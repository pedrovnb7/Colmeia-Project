<?php
include('protect.php');
require "conn.php";

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: pesquisar_avaliar_usuarios.php");
    exit();
}

$userId = $_GET['id'];

$sql = "SELECT * FROM usuarios WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $userId, PDO::PARAM_INT);
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    header("Location: pesquisar_avaliar_usuarios.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/avaliar_usuario.css">
    <title>Avaliar Usuário</title>
</head>
<body>
    <div class="container">
        <header id="header">
            <div class="menu">
                <a href="pesquisar_avaliar_usuarios.php" class="back-home"><i class="bi bi-arrow-left-circle"></i></a>
                <img src="assets/img/logo.png" class="logo" alt="Logo">
            </div>
        </header>
        <div class="content">
            <h1>Avaliar Usuário: <?= htmlspecialchars($usuario['nome']); ?></h1>
            <form action="processar_avaliacao.php" method="post">
    <input type="hidden" name="usuario_id" value="<?= $usuario['id']; ?>">
    <div class="rating">
    <input type="radio" name="rating" value="5" id="rating5"><label for="rating5">☆</label>
<input type="radio" name="rating" value="4" id="rating4"><label for="rating4">☆</label>
<input type="radio" name="rating" value="3" id="rating3"><label for="rating3">☆</label>
<input type="radio" name="rating" value="2" id="rating2"><label for="rating2">☆</label>
<input type="radio" name="rating" value="1" id="rating1"><label for="rating1">☆</label>

    </div>
    <button type="submit" class="button">Salvar Avaliação</button>
    <a href="pesquisar_avaliar_usuarios.php" class="button">Cancelar</a>
</form>

        </div>
        <?php require "footer.php"; ?>
    </div>
    <script src="assets/js/avaliar.js"></script>
</body>
</html>
