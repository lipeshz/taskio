<?php 
header('Content-Type: application/json');
require_once('../model/TaskDAO.php');

$dao = new TaskDAO();
$task = $dao->buscarPorToken($_POST['data-token']);
$resposta = [];

if($task){
    $dao->excluir($_POST['data-token']);
    $resposta['token_sucesso'] = true;
    echo json_encode($resposta);
}else{
    echo json_encode(['error' => 'Requisição inválida ou token inválido.']);
}
?>