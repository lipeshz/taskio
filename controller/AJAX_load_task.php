<?php 
header('Content-Type: application/json');
require_once('../model/TaskDAO.php');
session_start();

$dao = new TaskDAO();
$tarefas = $dao->buscarPorCriador($_SESSION['id_usuario']);
if($tarefas){
    echo json_encode(['tarefas' => $tarefas]);
    exit;
}else{
    echo json_encode(['error' => 'Requisião indisponível ou conexão com banco de dados interrompida.']);
}
?>