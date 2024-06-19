<?php
include('protect.php'); 
require "conn.php";

$lista = [];

$sql = $pdo->query("SELECT * FROM campanhas ORDER BY id DESC");

if($sql->rowCount() > 0){
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC); 
}

function formatDateTime($dateTime) {
    return date_format(new DateTime($dateTime), 'd/m/Y \à\s H:i');
}

function isRecentlyUpdated($dateTime) {
    $currentDateTime = new DateTime();
    $updateDateTime = new DateTime($dateTime);
    $interval = $currentDateTime->diff($updateDateTime);
    $minutes = ($interval->days * 24 * 60) + ($interval->h * 60) + $interval->i;
    return $minutes <= 60;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/campanha.css">
    <title>Colmeia</title>
</head>
<body>
    <div class="container">
        <header id="header">
            <div class="menu">
                <a href="index.php" class="logo-container" align="center">
                    <img src="assets/img/logo.png" class="logo" alt="Logo">
                    <h3>Campanhas</h3>
                </a>
                <h2>
                    <a href="cadastrarc.php"><i class="bi bi-arrow-right-circle"></i> Cadastrar campanhas</a>
                </h2>
            </div>
        </header>

        <main class="container-post">
            <?php foreach ($lista as $campanha): ?>
                <div class="post">
                    <div class="top-post">
                        <span>
                            <?= formatDateTime($campanha['data_create']); ?>
                            <?php if (isRecentlyUpdated($campanha['data_create'])): ?>
                                atualizado a
                            <?php endif; ?>
                        </span>
                    </div>
                    <div class="content-post">
                        <h3><?= $campanha['title_campanha']; ?></h3>
                        <details>
                            <br>
                            <summary>
                                <i class="bi bi-caret-right"></i>
                            </summary>
                            <div class="details-content">
                                <p><?= nl2br(htmlspecialchars($campanha['description_campanha'])); ?></p>
                            </div>
                        </details>
                        <div class="options">
                            <a href="editarc.php?id=<?= $campanha['id']; ?>" class="button edit">Editar</a>
                            <a href="excluirc.php?id=<?= $campanha['id']; ?>" class="button delete" onclick="return confirm('Tem certeza que deseja excluir essa campanha?')">Excluir</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </main>

        <?php require "footer.php"; ?>
    </div>

    <script>
        document.querySelectorAll('details').forEach((details) => {
            details.addEventListener('toggle', (event) => {
                const summaryIcon = details.querySelector('.bi-caret-right');
                const detailsContent = details.querySelector('.details-content');
                if (details.open) {
                    summaryIcon.style.transform = 'rotate(90deg)';
                    detailsContent.style.maxHeight = detailsContent.scrollHeight + 'px';
                } else {
                    summaryIcon.style.transform = 'rotate(0deg)';
                    detailsContent.style.maxHeight = '0';
                }
            });
        });
    </script>
</body>
</html>
