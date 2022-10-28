<?php 
session_start();
// print_r($_SESSION);
include_once('config.php');
include_once('projeto_functions.php');

if(!isset($_SESSION['email']) == true and (!isset($_SESSION['senha']) == true )){
    
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: tela_login.php');
}else{
    
    $logado = $_SESSION['email'];
    $senha = $_SESSION['senha'];
    
}

$teste = date_default_timezone_set('America/Sao_Paulo');
    // $hora = date('d/m/Y \à\s H:i:s');
    $variavel_dia = date('Y-m-d');
    $variavel_hora = date('h:i');

    echo '<br>'.$variavel_dia.' <===== <br>';
    echo '<br>'.$variavel_hora.' <===== <br>';

    

    

    if($variavel_dia > '2022-10-25' AND $variavel_hora == '8'){

        echo 'entrou no if';
    }else{

        echo 'entrou no else';
    }

    
    $sql = "SELECT id, data_ensaio, hora_ensaio, situacao FROM ensaios ORDER BY id DESC";
    echo $sql.'<br>';

    $result = mysqli_query($conexao, $sql);

    while($dados = mysqli_fetch_assoc($result)){
        // print_r($dados['data_ensaio']);
        // print_r($dados['hora_ensaio']);
        $data_hora = implode(" ",$dados);
        $id = $dados['id'];

        if($variavel_dia >= $dados['data_ensaio'] and $variavel_hora >= $dados['hora_ensaio'] and $dados['situacao'] == '1'){

            updateSituacaoAut($conexao,$id);
            // echo '<br> entrou aqui no if <br>';
            // echo '<br>'.$variavel_dia.' <===== VARIAVEL DIA<br>';
            // echo ''.$variavel_hora.' <===== VARIAVEL HORA <br>';
            // print_r($dados['id'].' <---id');
            // echo '<br>';
            // print_r($dados['data_ensaio']. ' <==== data do ensaio');
            // echo '<br>';
            // print_r($dados['hora_ensaio']. ' <==== hora do ensaio <br>');

        }else{

            // echo '<br>'.$variavel_dia.' <===== VARIAVEL DIA<br>';
            // echo ''.$variavel_hora.' <===== VARIAVEL HORA <br>';
            // echo '<br> entrou no else <br>';
            // print_r($dados['id'].' <---id');
            // echo '<br>';
            // print_r($dados['data_ensaio']. ' <==== data do ensaio');
            // echo '<br>';
            // print_r($dados['hora_ensaio']. ' <==== hora do ensaio <br>' );

        }
         
    }
    
    // print_r($dados);
?>