<?php
// echo 'entrou no ajax1111111111';
session_start();
// echo 'entrou no ajax';

include_once('config.php');

$id = $_POST['id'];


    $sql =" SELECT id, cliente, acompanhante, celular, email FROM clientes WHERE id = $id";
    echo $sql;
    $result = mysqli_query($conexao, $sql);

    while($dados = mysqli_fetch_assoc($result)){
        $dados = array(
            'id' => $dados['id'],
            'cliente' => $dados['cliente'],
            'acompanhante' => $dados['acompanhante'],
            'celular' => $dados['celular'],
            'email' => $dados['email']
        );

        // print_r($dados);
        echo json_encode($dados);
        // print_r($dados);

    } 
?>