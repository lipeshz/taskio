<?php 
header('Content-Type: application/json');
require_once('../model/TaskDAO.php');

$dao = new TaskDAO();
$task = $dao->buscarPorToken($_POST['data-token']);
$resposta = [];

if($task){
    $dao->excluir($_POST['data-token']);
    $resposta['token_sucesso'] = $_POST['data-token'];
    echo json_encode($resposta);
}else{
    $resposta['token_erro'] = $_POST['data-token'];
    echo json_encode($resposta);
}
?>