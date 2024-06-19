<?php
include('protect.php');
require "conn.php";
function obter_media_avaliacoes($pdo, $usuarioId) {
    $sqlMedia = "SELECT AVG(rating) AS media_avaliacao FROM avaliacoes WHERE usuario_id = :usuario_id";
    $stmtMedia = $pdo->prepare($sqlMedia);
    $stmtMedia->bindParam(':usuario_id', $usuarioId, PDO::PARAM_INT);
    $stmtMedia->execute();
    $mediaAvaliacao = $stmtMedia->fetch(PDO::FETCH_ASSOC);
    
    if ($mediaAvaliacao['media_avaliacao']) {
        return number_format($mediaAvaliacao['media_avaliacao'], 2);
    } else {
        return '-';
    }
}

// Consulta todos os usuários no banco de dados
$sql = "SELECT * FROM usuarios";
$stmt = $pdo->query($sql);
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/pesquisar_avaliar_usuarios.css">
    <title>Pesquisar e Avaliar Usuários</title>
</head>
<body>
    <div class="container">
    <header id="header">
            <div class="menu">
                <a href="index.php" ><img src="assets/img/logo.png" class="logo" alt="Logo"></a> 
            </div>
        </header>
        <div class="content">
        <h1>Pesquisar e Avaliar Usuários</h1>
        <div class="search-container">
        <input type="text" id="search" placeholder="Digite o nome do usuário">
        <button type="button" class="search-button"><i class="bi bi-search"></i></button>
        </div>
        <div id="searchResults" class="user-list">
            <ul id="userList">
                <?php foreach ($usuarios as $usuario): ?>
                <a href="avaliar_usuario.php?id=<?= $usuario['id']; ?>" class="user-link" data-id="<?= $usuario['id']; ?>">
                    <li data-id="<?= $usuario['id']; ?>">
                <div class="user-info">
                    <div class="user-name"><?= htmlspecialchars($usuario['nome']); ?></div>
                    <div class="user-email"><?= htmlspecialchars($usuario['email']); ?></div>
                    <div class="user-rating">Média de Avaliações: <?= obter_media_avaliacoes($pdo, $usuario['id']); ?></div>
                </div>
            </li>
                </a>
                <?php endforeach; ?>
            </ul>
            </div>
        </div>
        <?php require "footer.php"; ?>
    </div>
    <script src="assets/js/pesquisar_avaliar_usuarios.js"></script>
</body>
</html>
