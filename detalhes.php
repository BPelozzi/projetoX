
<?php
  session_start();
  // print_r($_SESSION);
  include_once('projeto_functions.php');
  
  if(!isset($_SESSION['email']) == true and (!isset($_SESSION['senha']) == true )){
      
      unset($_SESSION['email']);
      unset($_SESSION['senha']);
      header('Location: tela_login.php');
  }else{
      
      $logado = $_SESSION['email'];
      $senha = $_SESSION['senha'];
     
  }
  
    include_once('config.php');

    if(!empty($_GET['id'])){
        
        $id = $_GET['id'];
        $dadosDetalhes = dadosDetalhes($id,$conexao);

        print_r($dadosDetalhes);
    
    }
  
    // $titulo_detalhes = "<script>document.write(selection)</script>";
    // echo $titulostitulo_detalhes.' <--- testando varial titulos';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <title>Formulário Gestante</title>
</head>

<body>
    <div class="container">

        <!-- <div class="form-image">
            <img src="img//undraw_baby_re_1b87.svg" alt="">
        </div> -->
        
        <div class="form">

            <button type="button" id="voltar" class="btn btn-primary" onclick="document.location.href='pagina_view.php'">
                <span class="bi bi-x-lg"> Voltar</span>
            </button>
        
            <form action="data.php" method="POST">
                <div class="form-header">
                    <div class="title" id="div_infantil_smash" name="div_infantil_smash">
                        <h1>Ensaio Infantil Smash</h1>
                    </div>

                    <div class="title" id="div_gestante" name="div_gestante">
                        <h1>Ensaio Gestante</h1>
                    </div>

                    <div class="title" id="div_batizado" name="div_batizado">
                        <h1>Ensaio Batizado</h1>
                    </div>

                    <div class="title" id="div_infantil" name="div_infantil">
                        <h1>Ensaio Infantil</h1>
                    </div>

                    <div class="title" id="div_infantil_festa" name="div_infantil_festa">
                        <h1>Ensaio Infantil Festa</h1>
                    </div>

                    <div class="title" id="div_profissional" name="div_profissional">
                        <h1>Ensaio profissional</h1>
                    </div>
                    
                </div>

                <form action="data.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <div class="form-group col-md-3">
                        <label for="situacao" class="form-check-label">Status do Ensaio</label>
                        <select class="form-control" id="situacao" name="situacao">
                                    <?php
                                        $sqlSituacao = "SELECT * FROM tb_status";
                                        $resulSituacao = mysqli_query($conexao, $sqlSituacao);

                                        while($dadosSituacao = mysqli_fetch_assoc($resulSituacao)){?>
                                            <option value="<?=$dadosSituacao['id']?>" <?=($dadosDetalhes['situacao_status']==$dadosSituacao['situacao'])?"selected":""?>><?=$dadosSituacao['situacao']?></option>
                                        <?php }?>
                            </select>
                            <button type="submit" name="update_status_manual" class="btn btn-primary"  id="update_status_manual" placeholder="Atualizar" >Atualizar Status </button>
                    </div>


                </form>

                <input type="hidden" name="id" value="<?php echo $id?>">
                <input type="hidden" name="id" value="<?php echo $id?>">
                    <!-- <input type="hidden" valeu="gestante" name="tipo_ensaio"> -->
              
                    <div class="gender-input">
                        <input onchange="vista(this.val)" type="radio" id="infantil_smash" name="tipo_ensaio" value="Infantil Smash" <?php echo $dadosDetalhes['tipo_ensaio'] == 'Infantil Smash' ? 'checked' : '' ?>>
                            <label for="infantil">Infantil Smash</label>
                            
                        <input onchange="vista(this.val)" type="radio" id="gestante" name="tipo_ensaio" value="Gestante" <?php echo $dadosDetalhes['tipo_ensaio'] == 'Gestante' ? 'checked' : '' ?>>
                            <label for="infantil">Gestante</label>
                            
                        <input onchange="vista(this.val)" type="radio" id="batizado" name="tipo_ensaio" value="Batizado" <?php echo $dadosDetalhes['tipo_ensaio'] == 'Batizado' ? 'checked' : '' ?>>
                            <label for="infantil">Batizado</label>
                            
                        <input onchange="vista(this.val)" type="radio" id="infantil" name="tipo_ensaio" value="Infantil" <?php echo $dadosDetalhes['tipo_ensaio'] == 'Infantil' ? 'checked' : '' ?>>
                            <label for="infantil">Infantil</label>
                            
                        <input onchange="vista(this.val)" type="radio" id="infantil_festa" name="tipo_ensaio" value="Festa Infantil" <?php echo $dadosDetalhes['tipo_ensaio'] == 'Festa Infantil' ? 'checked' : '' ?>>
                            <label for="infantil">Infantil Festa</label>
                            
                        <input onchange="vista(this.val)" type="radio" id="profissional" name="tipo_ensaio" value="Profissional" <?php echo $dadosDetalhes['tipo_ensaio'] == 'Profissional' ? 'checked' : '' ?>>
                            <label for="infantil">Profissional</label>
                    </div>
            
            <div class="form-row">  
                <div class="form-group col-md-4">
                <label for="cliente" class="form-check-label">Cliente</label>
                    <input class="form-control" type="text" name="cliente" id="cliente" value="<?php echo $dadosDetalhes['cliente']?>" class="inputUser" >
                </div>
            
                <div class="form-group col-md-4">
                <label for="acompanhante" class="form-check-label">Acompanhante</label>
                    <input class="form-control" type="text" name="acompanhante" id="acompanhante" value="<?php echo $dadosDetalhes['acompanhante']?>" class="inputUser" >
                </div>
            </div>
            
            <div class="form-row">  
                <div class="form-group col-md-4">
                    <label for="email" class="form-check-label" >E-mail</label>
                    <input class="form-control" id="email" type="email" name="email" value="<?php echo $dadosDetalhes['email']?>" placeholder="Digite seu e-mail" required>
                </div>
                
                <div class="form-group col-md-4">
                    <label for="celular" class="form-check-label">Celular</label>
                    <input class="form-control" type="tel" name="celular" id="celular" value="<?php echo $dadosDetalhes['celular']?>" class="inputUser" >
                </div>
            </div>

                <div id="div_escondida" name="div_escondida">
                <div class="form-row">  
                    <div class="form-group col-md-6">
                    <label for="nome_crianca" class="labelImput">Nome da Criança 1</label>
                        <input class="form-control" type="text" name="nome_crianca" id="nome_crianca" value="<?php echo $dadosDetalhes['nome_crianca']?>" class="inputUser">
                    </div>
                
                    <div class="form-group col-md-2">
                    <label for="idade_crianca" class="labelImput">Idade da Criança 1</label>
                        <input class="form-control" type="text" name="idade_crianca" id="idade_crianca" value="<?php echo $dadosDetalhes['idade_crianca']?>" class="inputUser">
                    </div>
                </div>

                <div class="form-row">  
                    <div class="form-group col-md-6">
                    <label for="nome_crianca" class="labelImput">Nome da Criança 2</label>
                        <input class="form-control" type="text" name="nome_crianca2" id="nome_crianca2" value="<?php echo $dadosDetalhes['nome_crianca2']?>" class="inputUser">
                    </div>
                
                    <div class="form-group col-md-2">
                    <label for="idade_crianca" class="labelImput">Idade da Criança 2</label>
                        <input class="form-control" type="text" name="idade_crianca2" id="idade_crianca2" value="<?php echo $dadosDetalhes['idade_crianca2']?>" class="inputUser">
                    </div>
                </div>
                
            </div>
                
            <div class="form-row"> 
                <div class="form-group col-md-4">
                <label for="local_ensaio" class="form-check-label">Local do Ensaio</label>
                    <input class="form-control" type="text" name="local_ensaio" id="local_ensaio" value="<?php echo $dadosDetalhes['local_ensaio']?>" class="inputUser" >
                </div>

                <div class="form-group col-md-2">
                <label for="data_ensaio" class="form-check-label">Data do Ensaio</label>
                    <input class="form-control" type="date" name="data_ensaio" id="data_ensaio" value="<?php echo $dadosDetalhes['data_ensaio']?>" class="inputUser" >
                </div>
                
                <div class="form-group col-md-2">
                <label class="form-check-label" for="hora_ensaio">Hora do Ensaio</label>
                    <input class="form-control" type="time" id="hora_ensaio" name="hora_ensaio" value="<?php echo $dadosDetalhes['hora_ensaio']?>" >
                </div>

            </div>

            <div class="form-row"> 

                <div class="form-group col-md-3">
                <label for="pacote_fotos" class="form-check-label">Pacote do fotos</label>
                    <input class="form-control" type="text" name="pacote_fotos" id="pacote_fotos" value="<?php echo $dadosDetalhes['pacote_fotos']?>" class="inputUser" >
                </div>

                <div class="form-group col-md-2">
                <label for="valor_pacote" class="form-check-label">Valor do Pacote</label>
                    <input class="form-control" type="text" name="valor_pacote" id="valor_pacote" value="<?php echo $dadosDetalhes['valor_pacote']?>" class="inputUser" >
                </div>

                <!-- <div class="form-group col-md-3">
                <label for="forma_pagamento" class="form-check-label">Forma de Pagamento</label>
                    <input class="form-control" type="text" name="forma_pagamento" id="forma_pagamento" value="<?php echo $dadosDetalhes['cliente']?>" class="inputUser" >
                </div> -->
                <div class="form-group col-md-3">
                    <label for="forma_pagamento" class="form-check-label">Forma Pagamento</label>
                    <select class="form-control" id="forma_pagamento" name="forma_pagamento">
                            <option>Forma Pagamento</option>
                                <?php
                                    $sqlForma_pagamento = "SELECT * FROM forma_pagamento";
                                    $resulForma_pagamento = mysqli_query($conexao, $sqlForma_pagamento);

                                    while($dadosForma_pagamento = mysqli_fetch_assoc($resulForma_pagamento)){?>
                                        <option value="<?=$dadosForma_pagamento['forma_pagamento']?>" <?=($dadosDetalhes['forma_pagamento']==$dadosForma_pagamento['forma_pagamento'])?"selected":""?>><?=$dadosForma_pagamento['forma_pagamento']?></option>
                                    <?php }?>
                        </select>
                </div>
            </div>

            <div class="form-group">
                <label for="observacoes">Observações</label>
                <textarea class="form-control" id="observacoes" name="observacoes" rows="3" value="<?php echo $dadosDetalhes['observacoes']?>"><?php echo $dadosDetalhes['observacoes']?></textarea>
            </div>
                </div>

                <div class="gender-inputs">
                    <div class="gender-title">
                        <h6>Pagamento Concluido ?</h6>
                    </div>

                    <div class="gender-group">
                        <div class="gender-input">
                        <input type="radio" id="sim" value="sim" <?php echo $dadosDetalhes['pagamento_concluido'] == 'sim' ? 'checked' : '' ?> name="pagamento_concluido" >
                            <label for="sim">Sim</label>
                        
                            <input type="radio" id="nao" value="nao" <?php echo $dadosDetalhes['pagamento_concluido'] == 'nao' ? 'checked' : '' ?> name="pagamento_concluido" >
                            <label for="nao">NÃ£o</label>
                        </div>

                    </div>
                </div>

                <div class="gender-inputs">
                    <div class="gender-title">
                        <h6>Informacoes Adcionais ?</h6>
                    </div>

                    <div class="gender-group">
                        <div class="gender-input">
                            <?php if($dadosDetalhes['impressao_foto'] != '' || $dadosDetalhes['ajudante'] != '' || $dadosDetalhes['tempo_ensaio'] != ''){?>

                            <input type="radio" id="sim" name="incluir_adcionais" value="sim" checked >
                                <label for="sim">Sim</label>
                                <input type="radio" id="nao" name="incluir_adcionais" value="nao" >
                                <label for="nao">Nao</label>
                        <?php }else{?>

                            <input type="radio" id="sim" name="incluir_adcionais" value="sim" >
                                <label for="sim">Sim</label>
                            <input type="radio" id="nao" name="incluir_adcionais" value="nao" checked >
                                <label for="nao">Nao</label>

                        <?php }?>
                        </div>

                    </div>
                </div>

                
        <div class="form-group" id="div_esconde_adcionais" name="div_esconde_adcionais">
            <div class="form-row">  
                <div class="form-group col-md-4">
                <label for="impressao_foto">Fotos Impressas</label>
                    <input class="form-control" type="text" name="impressao_foto" id="impressao_foto" value="<?php echo $dadosDetalhes['impressao_foto']?>"  class="inputUser" >
                </div>
            
                <div class="form-group col-md-4">
                <label for="ajudante">Ajudante</label>
                    <input class="form-control" type="text" name="ajudante" id="ajudante" value="<?php echo $dadosDetalhes['ajudante']?>"  class="inputUser" >
                </div>
            </div>

            <div class="form-row">  
                <div class="form-group col-md-4">
                <label for="tempo_ensaio">Tempo de Ensaio</label>
                    <input class="form-control" id="tempo_ensaio" type="text" value="<?php echo $dadosDetalhes['tempo_ensaio']?>"  name="tempo_ensaio">
                </div>
            </div>
        </div>

                <button type="submit" name="update" class="btn btn-primary"  id="update" placeholder="Atualizar" >Atualizar </button>
                <!-- <input type="submit" name="deletar" id="deletar" placeholder="Deletar"> -->
                <button type="button" name="deletarDetalhes" id="deletarDetalhes" class=" btn btn-danger " value="deletar" >Deletar</button>
                <button type="submit" name="deletar" id="deletar"  value="<?=$id?>"class=" btn btn-danger "  style="display:none" >Deletar</button>
                

            </form>
        </div>
    </div>
</body>

</html>
<script type="text/javascript" src="jquery/jquery-3.4.1.js"></script>
<script type="text/javascript" src="js/alert.js"></script>

<script>




$('#deletarDetalhes').click(function () {
console.log(" entrou aqui");
    Swal.fire({
    title: 'Deseja deletar ensaio?',
    text: "Deletando o ensaio, nao sera possivel visualizar nele novamente",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sim, deletar ensaio!'
    }).then((result) => {
    if (result.isConfirmed) {
        Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
        )
        $('#deletar').click();
    }
    })
});



    
    $(document).ready(function(){
        var esconderCliente = $("input[name=cliente_cadastrado]:checked").val();
            console.log(esconderCliente);

        var esconderAdcionais = $("input[name=incluir_adcionais]:checked").val();
            console.log(esconderAdcionais);
	
	div_adcionais(esconderAdcionais);
	div_cliente(esconderCliente);
	
})

$("input[name=cliente_cadastrado]").change(function(data){ 

    var esconderCliente = $("input[name=cliente_cadastrado]:checked").val();
		div_cliente(esconderCliente);
        
});

$("input[name=incluir_adcionais]").change(function(data){ 
    
    var esconderAdcionais = $("input[name=incluir_adcionais]:checked").val();
		div_adcionais(esconderAdcionais);
});

function div_adcionais(esconderAdcionais){
    if(esconderAdcionais == "nao"){
        console.log('entrou no if');
        $("#div_esconde_adcionais").hide();
		// $("#campo_escondido2").show();
        // $("#campo_escondido").find("input").prop("disabled", true);
		// $("#campo_escondido2").find("select").prop("disabled", false);
    }else{
        console.log('entrou no else')
        $("#div_esconde_adcionais").show();
        // $("#campo_escondido").show();
		// $("#campo_escondido2").hide();
        // $("#campo_escondido").find("input").prop("disabled", false);
		// $("#campo_escondido2").find("select").prop("disabled", true);
	}
}

function div_cliente(esconderCliente){
    if(esconderCliente == "nao"){
        console.log('entrou no if');
        $("#div_esconde_cliente").hide();
		// $("#campo_escondido2").show();
        // $("#campo_escondido").find("input").prop("disabled", true);
		// $("#campo_escondido2").find("select").prop("disabled", false);
    }else{
        console.log('entrou no else')
        $("#div_esconde_cliente").show();
        // $("#campo_escondido").show();
		// $("#campo_escondido2").hide();
        // $("#campo_escondido").find("input").prop("disabled", false);
		// $("#campo_escondido2").find("select").prop("disabled", true);
	}
		
}

</script>

<script>
    
$(document).ready(function(){
        
    var selection = $("input[name=tipo_ensaio]:checked").val();
        console.log(selection);
        vista(selection);
	
})

$("input[name=tipo_ensaio]").change(function(data){ 
    
    var selection = $("input[name=tipo_ensaio]:checked").val();
		vista(selection);
});

function vista(selection){
    
    if(selection == "Infantil" || selection == "Infantil Smash" || selection == "Festa Infantil" || selection == "Batizado"){
        
        $("#div_escondida").show();
        
    }else{
        
        $("#div_escondida").hide();
        
	}

    if(selection == "Infantil"){
        
        $("#div_infantil").show();
        $("#div_gestante").hide();
        $("#div_infantil_smash").hide();
        $("#div_batizado").hide();
        $("#div_infantil_festa").hide();
        $("#div_profissional").hide();
    }else if(selection == "Gestante"){

        $("#div_gestante").show();
        $("#div_infantil").hide();
        $("#div_infantil_smash").hide();
        $("#div_batizado").hide();
        $("#div_infantil_festa").hide();
        $("#div_profissional").hide();
    }else if(selection == "Infantil Smash"){

        $("#div_infantil_smash").show();
        $("#div_infantil").hide();
        $("#div_gestante").hide();
        $("#div_batizado").hide();
        $("#div_infantil_festa").hide();
        $("#div_profissional").hide();
    }else if(selection == "Batizado"){

        $("#div_batizado").show();
        $("#div_infantil").hide();
        $("#div_gestante").hide();
        $("#div_infantil_smash").hide();
        $("#div_infantil_festa").hide();
        $("#div_profissional").hide();
    }else if(selection == "Festa Infantil"){

        $("#div_infantil_festa").show();
        $("#div_infantil").hide();
        $("#div_gestante").hide();
        $("#div_infantil_smash").hide();
        $("#div_batizado").hide();
        $("#div_profissional").hide();
    }else if(selection == "Profissional"){

        $("#div_profissional").show();
        $("#div_infantil_festa").hide();
        $("#div_infantil").hide();
        $("#div_gestante").hide();
        $("#div_infantil_smash").hide();
        $("#div_batizado").hide();
    }
		
}

</script>