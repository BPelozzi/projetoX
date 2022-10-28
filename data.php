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
    
if(isset($_POST['insert'])){ 

    $tipo_ensaio        = $_POST['tipo_ensaio'];
    $data_ensaio        = $_POST['data_ensaio'];
    $hora_ensaio        = $_POST['hora_ensaio'];
    $local_ensaio       = $_POST['local_ensaio'];
    $pacote_fotos       = $_POST['pacote_fotos'];
    $nome_crianca       = $_POST['nome_crianca'];
    $idade_crianca      = $_POST['idade_crianca'];
    $nome_crianca2      = $_POST['nome_crianca2'];
    $idade_crianca2     = $_POST['idade_crianca2'];
    $material_smash     = $_POST['material_smash'];
    $valor_pacote       = $_POST['valor_pacote'];
    $forma_pagamento    = $_POST['forma_pagamento'];
    $pagamento_concluido = $_POST['pagamento_concluido'];
    $observacoes        = $_POST['observacoes'];
    $impressao_foto     = $_POST['impressao_foto'];
    $ajudante           = $_POST['ajudante'];
    $tempo_ensaio       = $_POST['tempo_ensaio'];
    $cliente            = $_POST['cliente'];
    $acompanhante       = $_POST['acompanhante'];
    $celular            = $_POST['celular'];
    $email              = $_POST['email'];
    $id_ensaios         = $_POST['id_ensaios'];

    $sql ="SELECT id FROM usuarios WHERE email = '$logado' AND senha = '$senha'";
   
    $result = mysqli_query($conexao, $sql);
    $arrayResutado = mysqli_fetch_assoc($result);
    $id_usuarios = $arrayResutado['id'];

   
    dadosClienteInsert($id_usuarios,$tipo_ensaio, $data_ensaio, $hora_ensaio, $local_ensaio, $pacote_fotos, $nome_crianca, $idade_crianca, $nome_crianca2,$idade_crianca2,
    $material_smash,$valor_pacote,$forma_pagamento,$pagamento_concluido,$observacoes,$impressao_foto,$ajudante,$tempo_ensaio,$conexao,$id_ensaios,$cliente,$acompanhante,$celular,$email);
   
    
    
        ?><script type="text/javascript" src="js/alert.js"></script><?php

        echo '<script> </script>e.preventDefault(); swal("Good job!", "You clicked the button!", "success") </script>';
    
   
    exit();
     echo '<script> alert ("Ensaio Inserido Com Sucesso!"); location.href=("pagina_view.php")</script>';

}else if(isset($_POST['update'])){

    $id = $_POST['id'];

    $tipo_ensaio        = $_POST['tipo_ensaio'];
    $data_ensaio        = $_POST['data_ensaio'];
    $hora_ensaio        = $_POST['hora_ensaio'];
    $local_ensaio       = $_POST['local_ensaio'];
    $pacote_fotos       = $_POST['pacote_fotos'];
    $nome_crianca       = $_POST['nome_crianca'];
    $idade_crianca      = $_POST['idade_crianca'];
    $nome_crianca2      = $_POST['nome_crianca2'];
    $idade_crianca2     = $_POST['idade_crianca2'];
    $material_smash     = $_POST['material_smash'];
    $valor_pacote       = $_POST['valor_pacote'];
    $forma_pagamento    = $_POST['forma_pagamento'];
    $pagamento_concluido = $_POST['pagamento_concluido'];
    $observacoes        = $_POST['observacoes'];
    $impressao_foto     = $_POST['impressao_foto'];
    $ajudante           = $_POST['ajudante'];
    $tempo_ensaio       = $_POST['tempo_ensaio'];
    $cliente            = $_POST['cliente'];
    $acompanhante       = $_POST['acompanhante'];
    $celular            = $_POST['celular'];
    $email              = $_POST['email'];
    $id_ensaios         = $_POST['id_ensaios'];

    upadateCliente($id,$data_ensaio,$hora_ensaio,$tipo_ensaio,$local_ensaio,$pacote_fotos,$nome_crianca,$idade_crianca,$nome_crianca2,$idade_crianca2,$material_smash,$valor_pacote,
    $forma_pagamento,$pagamento_concluido,$observacoes,$impressao_foto,$ajudante,$tempo_ensaio,$conexao,$cliente,$acompanhante,$celular,$email);

    echo '<script> alert ("Ensaio Atualizado Com Sucesso!"); location.href=("pagina_view.php")</script>';

}else if(isset($_POST['deletar'])){

    $id = $_POST['id'];

    deletareEnsaios($id,$conexao);
    
     echo '<script> alert ("Ensaio Excluido Com Sucesso!"); location.href=("pagina_view.php")</script>';

}else if(isset($_POST['update_status_manual'])){

    $id = $_POST['id'];
    $situacao = $_POST['situacao'];

    updateSituacaoManual($conexao,$id, $situacao);

    echo '<script> alert ("Status Alterado com Sucesso!"); location.href=("detalhes.php?id='.$id.'")</script>';
    echo $id.' < =-=-=-=-=--=-=-=';
}

?>