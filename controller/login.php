<?php 
header('Content-Type: application/json');
require_once '../model/UsuarioDAO.php';
session_start();
$dao = new UsuarioDAO();
$resposta = [];

if(empty($_POST['email'])){
    $resposta['errors']['email'] = "Forneça o E-Mail.";
}

if(empty($_POST['senha'])){
    $resposta['errors']['senha'] = "Forneça a senha!";
}

if(empty($resposta)){
    $usuario = $dao->buscarPorEmail($_POST['email']);
    if($usuario){
        if(password_verify($_POST['senha'], $usuario['senha'])){
            $resposta['sucesso'] = true;
            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['email'] = $usuario['email'];
            echo json_encode($resposta);
            exit;
        }else{
            $resposta['errors']['senha'] = "Senha ou e-mail incorretos.";
            echo json_encode($resposta);
            exit;
        }
    }
}else{
    echo json_encode($resposta);
    exit;
}

?>  