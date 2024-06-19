<?php

require "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title_campanha = $_POST['title_campanha'];
    $description_campanha = $_POST['description_campanha'];
    $id = $_POST['id'];

    $stmt = $pdo->prepare("UPDATE campanhas SET title_campanha = :title_campanha, description_campanha = :description_campanha WHERE id = :id");
    $stmt->bindParam(':title_campanha', $title_campanha);
    $stmt->bindParam(':description_campanha', $description_campanha);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header("Location: campanhas.php");
        exit();
    } else {
        echo "Erro ao editar a campanha";
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM campanhas WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $campanha = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    header("Location: vitrine.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/cadastrar.css">
    <title>Editar campanha</title>
</head>
<body>
<br><br>
<div class="menu">
        <a href="campanhas.php" class="back-home"><i class="bi bi-arrow-left-circle"></i></a>
        <h2 class="card-title" style="text-align: center;">Editar Campanha</h2>
</div>
    </header>
    <main id="main">
    <form class="form" method="POST">
    <div class="input-search">
        <label for="inputCampanha">Editar título da campanha: </label>
        <input type="text" name="title_campanha" id="inputCampanha" value="<?= $campanha['title_campanha']; ?>" required>
    </div>
    <div class="input-search">
        <label for="inputDescription">Editar descrição: </label>
        <textarea name="description_campanha" rows="5" id="inputDescription" required><?= $campanha['description_campanha']; ?></textarea>
    </div>
    <div class="input-search">
        <input type="hidden" name="id" value="<?= $campanha['id']; ?>">
        <br><br>
        <input type="submit" value="Salvar">
    </div>
    
</form>
</main>
<?php require "footer.php"; ?>
</body>
</html>