<?php 
require_once('../model/TaskDAO.php');
session_start();
$dao = new TaskDAO();
$task = new Task();
$erros = [];

if(!isset($_SESSION['id_usuario'])){
    header('Location:../view/login.php');
}else{
    if(empty($_POST['titulo'])){
        $erros['titulo_vazio'] = "Insira um título!";
    }

    if(empty($_POST['data_limite'])){
        $erros['data_limite_vazia'] = "Insira uma data!";
    }
}

if(!empty($erros)){
    $_SESSION = array_merge($erros);
    header('Location:../view/tasks.php');
}
?>