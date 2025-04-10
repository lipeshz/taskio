<?php
require_once('../model/UsuarioDAO.php');
header('Content-Type: application/json');
session_start();

if(isset($_SESSION['id_usuario'])){
    $dao = new UsuarioDAO();
    $usuario = $dao->buscarPorId($_SESSION['id_usuario']);
    if($usuario){
        echo json_encode(['usuario' => $usuario]);
        exit;
    }
}else{
    header('location:../view/login.php');
}
?>