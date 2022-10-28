<?php

    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = 'Bruno32329290*';
    $dbName = 'projetox';

    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if($conexao->connect_errno){
        echo "Erro";
    }else{
        echo "Conexao feita com sucesso";
    }

?>