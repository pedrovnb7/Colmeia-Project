<?php

    require "conn.php";

    $title_campanha = filter_input(INPUT_POST, 'campanha') ;
    $description_campanha = filter_input(INPUT_POST, 'descriptionc') ;


    if(isset($title_campanha) && !empty($title_campanha) && isset($description_campanha) && !empty($description_campanha)) {
        $sql = $pdo->prepare("INSERT INTO campanhas (title_campanha, description_campanha) VALUES(:campanha, :descriptionc)");
        $sql->bindValue(':campanha', $title_campanha);
        $sql->bindValue(':descriptionc', $description_campanha);
        $sql->execute();

        echo "
        <script>
            alert('Cadastrado com sucesso');
            window.location.href = 'campanhas.php';
        </script>
        ";
        exit;
    } else
        echo "
        <script>
            alert('Por favor preencha todos os campos');
            window.location.href = 'cadastrarc.php';
        </script>
    ";


?>