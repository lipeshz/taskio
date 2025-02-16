<?php
header('Content-Type: application/json');
require_once('../model/TaskDAO.php');

if(isset($_POST['token'])){
    $dao = new TaskDAO();
    $task = $dao->buscarPorToken($_POST['token']);

    if($task){
        echo json_encode(['sucesso' => true,
        'tarefa' => [
            'titulo' => $task['titulo'],
            'descricao' => $task['descricao'],
            'data_limite' => $task['data_limite']
        ]]);

        exit;
    }else{
        echo json_encode(['error' => true]);
        exit;
    }
}
?>