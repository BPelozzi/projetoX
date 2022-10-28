<?php
// session_start();
include_once('config.php');
// print_r($_SESSION);

if(!isset($_SESSION['email']) == true and (!isset($_SESSION['senha']) == true )){
    
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: tela_login.php');
}else{
    
    $logado = $_SESSION['email'];
    $senha = $_SESSION['senha'];
    
}


function getTabelaClientes($conexao, $logado, $senha){
    GLOBAL $result;

    $sqlID = "SELECT id FROM usuarios WHERE email = '$logado' AND senha = '$senha'";
    $resultID = mysqli_query($conexao, $sqlID);
    
    while($dadosID = mysqli_fetch_assoc($resultID)){
        $id_usuarios = implode(" ",$dadosID);

        $sql = "SELECT DISTINCT
                    e.id_usuarios,
                    e.id,
                    c.cliente,
                    e.tipo_ensaio,
                    c.celular,
                    e.hora_ensaio,
                    e.data_ensaio,
                    e.local_ensaio,
                    e.forma_pagamento,
                    e.pagamento_concluido,
                    s.situacao
                FROM
                    ensaios AS e
                        LEFT JOIN
                    clientes AS c ON c.id_ensaios = e.id
                        LEFT JOIN
                    tb_status AS s ON s.id = e.situacao
                WHERE
                    e.id_usuarios = '{$id_usuarios}'
                ORDER BY e.id DESC";
   
                $result = $conexao->query(($sql));

                while ($row = mysqli_fetch_assoc($result)) {
                    $dados[] = $row;
                }
                return $dados;
    }
}



function dadosClienteInsert($id_usuarios,$tipo_ensaio, $data_ensaio, $hora_ensaio, $local_ensaio, $pacote_fotos, $nome_crianca, $idade_crianca, $nome_crianca2,$idade_crianca2,
$material_smash,$valor_pacote,$forma_pagamento,$pagamento_concluido,$observacoes,$impressao_foto,$ajudante,$tempo_ensaio,$conexao,$id_ensaios,$cliente,$acompanhante,$celular,$email)
{
    

    $sql = "INSERT INTO ensaios
                                 (
                                 id_usuarios,
                                tipo_ensaio,
                                data_ensaio,
                               hora_ensaio,
                                local_ensaio, 
                                pacote_fotos,
                                nome_crianca,
                                idade_crianca,
                                nome_crianca2,
                                idade_crianca2,
                                material_smash, 
                                valor_pacote, 
                                forma_pagamento, 
                                pagamento_concluido,
                                observacoes,
                                impressao_foto,
                                ajudante,
                                tempo_ensaio,
                                data_insercao,
                                situacao)
                        VALUES (
                                '$id_usuarios',
                                '$tipo_ensaio',
                                '$data_ensaio',
                                '$hora_ensaio',
                                '$local_ensaio',
                                '$pacote_fotos',
                                '$nome_crianca',
                                '$idade_crianca',
                                '$nome_crianca2',
                                '$idade_crianca2',
                                '$material_smash',
                                '$valor_pacote',
                                '$forma_pagamento',
                                '$pagamento_concluido',
                                '$observacoes',
                                '$impressao_foto',
                                '$ajudante',
                                '$tempo_ensaio',
                                NOW(),
                                  '1')";
   
    $result = $conexao->query(($sql));

    
    $sql ="SELECT id FROM ensaios order by id desc limit 1";
   
    $result = mysqli_query($conexao, $sql);
    $arrayResutado = mysqli_fetch_assoc($result);
    $id_ensaios = $arrayResutado['id'];


    $sql = "INSERT INTO clientes
                (id_ensaios, 
                id_usuarios, 
                cliente, 
                acompanhante, 
                celular,
                email)
            VALUES ('$id_ensaios', 
                '$id_usuarios', 
                '$cliente', 
                '$acompanhante', 
                '$celular', 
                '$email')";
   
    $result = $conexao->query(($sql));

}

function upadateCliente($id,$data_ensaio,$hora_ensaio,$tipo_ensaio,$local_ensaio,$pacote_fotos,$nome_crianca,$idade_crianca,$nome_crianca2,$idade_crianca2,$material_smash,$valor_pacote,
$forma_pagamento,$pagamento_concluido,$observacoes,$impressao_foto,$ajudante,$tempo_ensaio,$conexao,$cliente,$acompanhante,$celular,$email){

    $sql = "UPDATE 
                ensaios 
            SET 
                data_ensaio='$data_ensaio', hora_ensaio='$hora_ensaio', tipo_ensaio='$tipo_ensaio', local_ensaio='$local_ensaio', 
                pacote_fotos='$pacote_fotos', nome_crianca='$nome_crianca', idade_crianca='$idade_crianca', nome_crianca2='$nome_crianca2',
                idade_crianca2='$idade_crianca2', material_smash='$material_smash', valor_pacote='$valor_pacote', forma_pagamento='$forma_pagamento',
                pagamento_concluido='$pagamento_concluido', observacoes='$observacoes', impressao_foto='$impressao_foto', ajudante='$ajudante', tempo_ensaio='$tempo_ensaio'
            WHERE 
                id= '$id'";
   
    $result = $conexao->query(($sql));


    $sql = "UPDATE 
                clientes 
            SET 
                cliente='$cliente', 
                acompanhante='$acompanhante', 
                celular='$celular', 
                email='$email' 
            WHERE 
                id_ensaios= '$id'";
   
    $result = $conexao->query(($sql));
    
}

function dadosDetalhes($id,$conexao){

    $sql = "SELECT 
                *,s.situacao AS situacao_status
            FROM
                ensaios AS e
            JOIN
                clientes AS c ON c.id_ensaios = e.id
            JOIN
                tb_status AS s ON s.id = e.situacao
            WHERE e.id = $id";
                    echo $sql;
    $result = $conexao->query(($sql));

    while ($row = mysqli_fetch_assoc($result)) {
        $dados = $row;
    }
    return $dados;
   
}

function deletareEnsaios($id,$conexao){

    $sql = "DELETE FROM ensaios WHERE id=$id";
    
    $resultDelete2 = $conexao ->query($sql);
}

function updateSituacaoAut($conexao,$id){
    GLOBAL $result;

    $sql = "UPDATE 
                ensaios 
            SET 
                situacao='3' 
            WHERE 
                id= '$id'";
   echo $sql;
    $result = $conexao->query(($sql));
}

function updateSituacaoManual($conexao,$id, $situacao){
    GLOBAL $result;

    $sql = "UPDATE 
                ensaios 
            SET 
                situacao='$situacao' 
            WHERE 
                id= '$id'";
   echo $sql;
    $result = $conexao->query(($sql));
}