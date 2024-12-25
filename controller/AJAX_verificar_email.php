<?php 
header('Content-Type: application/json');
require_once('../model/UsuarioDAO.php');

$resposta['email_existe'] = false;
$dao = new UsuarioDAO();


if(isset($_POST['email'])){
    $usuario = $dao->buscarPorEmail($_POST['email']);
    if($usuario){
        $resposta['email_existe'] = true;
    }else{
        $resposta['email_existe'] = false;
    }
}

echo json_encode($resposta);
exit;
?>