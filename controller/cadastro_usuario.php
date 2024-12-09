<?php
require '../model/UsuarioDAO.php';
session_start();

$erros = [];
$dao = new UsuarioDAO();

$email = trim($_POST['email']);
$senha = trim($_POST['senha']);
$conf_senha = trim($_POST['conf_senha']);

if(trim($_POST['nome']) == ""){
    $erros['err_nome'] = "O campo é obrigatório";
}

if($dao->buscarPorEmail($email)){
    $erros['err_email'] = "E-Mail já cadastrado.";
}else if(($email) == ''){
    $erros['err_email'] = "O campo é obrigatório";
}

if($senha != $conf_senha){
    $erros['err_senha'] = "As senhas fornecidas não condizem.";
}else if($senha == "" && $conf_senha == ""){
    $erros['err_senha'] = "O campo é obrigatório.";
}

if(empty($erros)){
    $usuario = new Usuario();
    $usuario->setNome($_POST['nome']);
    $usuario->setEmail($_POST['email']);
    $usuario->setSenha(password_hash($_POST['senha'], PASSWORD_DEFAULT));

    $dao->inserir($usuario);
    header('Location:../view/index.php');
    exit;
}else{
    $_SESSION = $erros;
    $_SESSION['nome_'] = $_POST['nome'];
    $_SESSION['email_err'] = $_POST['email'];
    header('Location:../view/cadastro.php');
    exit;
}
?>