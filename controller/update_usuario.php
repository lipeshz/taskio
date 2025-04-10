<?php 
header('Content-Type: application/json');
require_once('../model/UsuarioDAO.php');
session_start();

$dao = new UsuarioDAO();
$usuario = $dao->buscarPorId($_SESSION['id_usuario']);
$resposta = [];
if($_POST['form'] == 'email'){
    $email = $_POST['email'];
    $nome = $_POST['nome'];

    if(!$email){
        $resposta['erros']['email'] = 'E-Mail inválido!';
    }else{
        $usuario['email'] = $email;
    }

    if(!$nome){
        $resposta['erros']['nome'] = 'Nome inválido!';
    }else{
        $usuario['nome'] = $nome;
    }

    if(empty($resposta)){
        $resposta['sucesso'] = true;
        echo json_encode($resposta);
        $dao->atualizarUsuario($usuario);
    }else{
        echo json_encode($resposta);
    }
} else if($_POST['form'] == 'senha'){
    $senha = $_POST['senha'];
    $conf_senha = $_POST['conf_senha'];

    if(!$senha || !$conf_senha){
        $resposta['erros']['senha'] = 'Senha não pode estar vazia!';
    }

    if($senha != $conf_senha){
        $resposta['erros']['senha'] = 'Senhas não condizem!';
    }

    if(empty($resposta)){
        $resposta['sucesso'] = true;
        $usuario['senha'] = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        echo json_encode($resposta);
        $dao->atualizarSenha($usuario);
    }else{
        echo json_encode($resposta);
    }
}
?>