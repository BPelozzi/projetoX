<?php
session_start();
include_once('config.php');
include_once('projeto_functions.php');

// print_r($_SESSION);

if(!isset($_SESSION['email']) == true and (!isset($_SESSION['senha']) == true )){
    
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: tela_login.php');
}else{
    
    $logado = $_SESSION['email'];
    $senha = $_SESSION['senha'];

}

    $getTabelaClientes = getTabelaClientes($conexao, $logado, $senha);

    
    $teste = date_default_timezone_set('America/Sao_Paulo');
    $hora = date('d/m/Y \à\s H:i:s');
    echo $hora;
    echo $teste;

    // echo date('d/m/Y \à\s H:i:s')

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <title>Pagina View</title>
</head>
    <body>
        <h1>Ensaios</h1>
        <br>
        
        
        
        
        <div class="m-5">
            <button type="button" id="gestante" class="btn btn-primary" onclick="document.location.href='formularios/forms_gestante.php'">
                <span class="bi bi-x-lg"> Gestante</span>
            </button>
            <button type="button" id="infantil" class="btn btn-primary" onclick="document.location.href='formularios/forms_infantil.php'">
                <span class="bi bi-x-lg"> Infantil</span>
            </button>
            <button type="button" id="batizado" class="btn btn-primary" onclick="document.location.href='formularios/forms_batizado.php'">
                <span class="bi bi-x-lg"> Batizado</span>
            </button>
            <button type="button" id="festa_infantil" class="btn btn-primary" onclick="document.location.href='formularios/forms_festa_infantil.php'">
                <span class="bi bi-x-lg"> Festa Infantil</span>
            </button>
            <button type="button" id="infantil_smash" class="btn btn-primary" onclick="document.location.href='formularios/forms_infantil_smash.php'">
                <span class="bi bi-x-lg"> Festa Smash</span>
            </button>
            <button type="button" id="profissional" class="btn btn-primary" onclick="document.location.href='formularios/forms_profissional.php'">
                <span class="bi bi-x-lg"> Profissional</span>
            </button>
            
            <br><br><table class="table ">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Tipo do Ensaio</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Hora do Ensaio</th>
                    <th scope="col">Data do Ensaio</th>
                    <th scope="col">Local do Ensaio</th>
                    <th scope="col">Forma Pagamento</th>
                    <th scope="col">Pagamento Concluido</th>
                    <th scope="col">Status</th>
                    <th scope="col">#</th>
                    </tr>
                </thead>
                <tbody>  
                    <?php   
                       foreach ($getTabelaClientes as $dadosView)
                        {
                            echo "<tr>";
                                echo "<td>".$dadosView['id'];
                                echo "<td>".$dadosView['cliente'];
                                echo "<td>".$dadosView['tipo_ensaio'];
                                echo "<td>".$dadosView['celular'];
                                echo "<td>".$dadosView['hora_ensaio'];
                                echo "<td>".$dadosView['data_ensaio'];
                                echo "<td>".$dadosView['local_ensaio'];
                                echo "<td>".$dadosView['forma_pagamento'];
                                echo "<td>".$dadosView['pagamento_concluido'];
                                echo "<td>".$dadosView['situacao'];
                                echo "<td>
                                        <a class='btn btn-primary btn-sm' href='detalhes.php?id=$dadosView[id]'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                        </svg> ";
                            echo "</tr>";  
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
<script type="text/javascript" src="jquery/jquery-3.4.1.js"></script>
