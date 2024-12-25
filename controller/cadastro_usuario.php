<?php
header('Content-Type: application/json');
require '../model/UsuarioDAO.php';
session_start();

$dao = new UsuarioDAO();

$email = trim($_POST['email']);
$senha = trim($_POST['senha']);
$conf_senha = trim($_POST['conf_senha']);
$resposta = [];

if($_POST['nome'] == ""){
    $resposta['errors']['nome'] = "Nome não pode estar vazio!";
}

if($dao->buscarPorEmail($email)){
    $resposta['errors']['email'] = "E-Mail já cadastrado!";
}else if(empty($email)){
    $resposta['errors']['email'] = "E-Mail não pode estar vazio!";
}

if($senha != $conf_senha){
    $resposta['errors']['senha'] = "Senhas não coincidem!";
}else if(empty($senha) && empty($conf_senha)){
    $resposta['errors']['senha'] = "Senhas não podem estar vazias!";
}

if(empty($resposta)){
    $resposta['sucesso'] = true;
    $usuario = new Usuario();
    $usuario->setNome($_POST['nome']);
    $usuario->setEmail($_POST['email']);
    $usuario->setSenha(password_hash($_POST['senha'], PASSWORD_DEFAULT));

    $dao->inserir($usuario);
    echo json_encode($resposta);
    exit;
}else{
    echo json_encode($resposta);
    exit;
}
?>