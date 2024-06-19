<?php
include('protect.php'); 
require "conn.php";

$lista = [];

$sql = $pdo->query("SELECT * FROM vagas ORDER BY id DESC");

if($sql->rowCount() > 0){
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC); 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/vitrine.css">
    <title>Colmeia</title>

</head>
<body>
    <div class="container">
    <header id="header">
            <div class="menu">
            <a href="index.php" class="logo-container"> <img src="assets/img/logo.png" class="logo" alt="Logo"><h3>Vitrine de Oportunidades</h3></a>
                <h2>
                    <a href="cadastrarv.php"><i class="bi bi-arrow-right-circle"></i> Cadastrar Vagas</a>
                </h2>
            </div>
        </header>

    <main class="container-post">
    <div class="card-container">
        <?php foreach ($lista as $vaga): ?>
            <div class="card">
                <div class="top-post menu">
                    <span><?= date_format(new DateTime($vaga['data_create']), 'd/m/Y'); ?></span>
                </div>
                <div class="content-post">
                    <h3><?= $vaga['title_vaga']; ?></h3>
                    <details>
                    <br>
                        <summary>
                            <i class="bi bi-caret-right"></i>
                        </summary>
                        <div class="details-content">
                            <p><?= nl2br(htmlspecialchars($vaga['description_vaga'])); ?></p>
                        </div>
                    </details>
                    <div class="options">
                        <a href="editarv.php?id=<?= $vaga['id']; ?>" class="button edit">Editar</a>
                        <a href="excluirv.php?id=<?= $vaga['id']; ?>" class="button delete" onclick="return confirm('Tem certeza que deseja excluir essa vaga?')">Excluir</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>


        <?php require "footer.php"; ?>
    </div>

    <script>
        document.querySelectorAll('details').forEach((details) => {
            details.addEventListener('toggle', (event) => {
                const summaryIcon = details.querySelector('.summary-icon');
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
