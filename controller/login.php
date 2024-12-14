<?php 
require_once '../model/UsuarioDAO.php';
session_start();
$dao = new UsuarioDAO();
$usuario = $dao->buscarPorEmail($_POST['email']);
$erros = [];

if($usuario){
    if(password_verify($_POST['senha'], $usuario['senha'])){
        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        $_SESSION['email'] = $usuario['email'];
        header('Location:../view/index.php');
    }else{
        $erros['senha_err_login'] = "Senha ou e-mail incorretos.";
    }
}else if(empty($_POST['email'])){
    $erros['email_err_login'] = "Forneça o E-Mail.";
}else{
    $erros['email_err_login'] = "E-Mail não cadastrado.";
}

if(!empty($erros)){
    header('Location:../view/login.php');
    $_SESSION = array_merge($erros);
}
?>  