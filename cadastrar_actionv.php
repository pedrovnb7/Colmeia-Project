<?php

    require "conn.php";

    $title_vaga = filter_input(INPUT_POST, 'vaga') ;
    $description_vaga = filter_input(INPUT_POST, 'descriptionv') ;


    if(isset($title_vaga) && !empty($title_vaga) && isset($description_vaga) && !empty($description_vaga)) {
        $sql = $pdo->prepare("INSERT INTO vagas (title_vaga, description_vaga) VALUES(:vaga, :descriptionv)");
        $sql->bindValue(':vaga', $title_vaga);
        $sql->bindValue(':descriptionv', $description_vaga);
        $sql->execute();

        echo "
        <script>
            alert('Cadastrado com sucesso');
            window.location.href = 'vitrine.php';
        </script>
        ";
        exit;
    } else
        echo "
        <script>
            alert('Por favor preencha todos os campos');
            window.location.href = 'cadastrarv.php';
        </script>
    ";


?>