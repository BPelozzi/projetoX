<?php
session_start();
// print_r($_REQUEST);

if(isset($_POST['enviar_login']) && !empty($_POST['email']) && !empty($_POST['senha'])){
    
    include_once('config.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    echo $email;
    echo $senha;

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $result = $conexao -> query($sql);
    
    if(mysqli_num_rows($result) < 1){

        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        // header('Location: tela_login.php');
        echo '<script> alert ("Email ou Senha Incorreta!"); location.href=("tela_login.php")</script>';
    }else{
        $_SESSION['id'] = $id;
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;

        header('Location: pagina_view.php');
    }
    


}else{
    header('location: tela_login.php');
}
?>