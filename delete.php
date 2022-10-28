<?php

if(!empty($_GET['id'])){
        
    include_once($_GET['config.php']);

    $id = $_GET['id'];

        $SqlSelect = "SELECT 
                       *
                    FROM
                        clientes AS c 
                            JOIN
                        ensaios AS e ON e.id_cliente = c.id
                        WHERE e.id = $id";

        $result = $conexao ->query($SqlSelect);

        if($result->num_rows > 0){

            // $SqlDelete = "DELETE * FROM clientes WHERE id=$id";
            // $resultDelete = $conexao ->query($SqlDelete);

            $SqlDelete2 = "DELETE * FROM ensaios WHERE id=$id";
            $resultDelete2 = $conexao ->query($SqlDelete2);

        }else{
            header('Location: detalhes.php');
        }
    }