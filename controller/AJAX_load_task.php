<?php 
header('Content-Type: application/json');
require_once('../model/TaskDAO.php');
session_start();

$dao = new TaskDAO();
$tarefas = $dao->buscarPorCriador($_SESSION['id_usuario']);

echo json_encode(['tarefas' => $tarefas]);
exit;
?>