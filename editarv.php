<?php
include('protect.php'); 
require "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title_vaga = $_POST['title_vaga'];
    $description_vaga = $_POST['description_vaga'];
    $id = $_POST['id'];

    $stmt = $pdo->prepare("UPDATE vagas SET title_vaga = :title_vaga, description_vaga = :description_vaga WHERE id = :id");
    $stmt->bindParam(':title_vaga', $title_vaga);
    $stmt->bindParam(':description_vaga', $description_vaga);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header("Location: vitrine.php");
        exit();
    } else {
        echo "Erro ao editar a vaga";
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM vagas WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $vaga = $stmt->fetch(PDO::FETCH_ASSOC);
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
    <title>Editar Vaga</title>
</head>
<body>
<br><br>
<div class="menu">
        <a href="campanhas.php" class="back-home"><i class="bi bi-arrow-left-circle"></i></a>
        <h2 class="card-title" style="text-align: center;">Editar Campanha</h2>
</div>
    <main id="main">
    <form class="form" method="POST">
    <div class="input-search">
        <label for="inputVaga">Editar título da Vaga: </label>
        <input type="text" name="title_vaga" id="inputVaga" value="<?= $vaga['title_vaga']; ?>" required>
    </div>
    <div class="input-search">
        <label for="inputDescription">Editar descrição: </label>
        <textarea name="description_vaga" rows="5" id="inputDescription" required><?= $vaga['description_vaga']; ?></textarea>
    </div>
    <div class="input-search">
        <input type="hidden" name="id" value="<?= $vaga['id']; ?>">
        <br><br>
        <input type="submit" value="Salvar">
    </div>
    
</form>
</main>
<?php require "footer.php"; ?>
</body>
</html>