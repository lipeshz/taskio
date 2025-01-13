<?php 
require_once('../model/TaskDAO.php');
session_start();

$resposta = [];
$data_atual = $_POST['data_atual'];

if(empty($_POST['titulo'])){
    $resposta['errors']['err_titulo'] = "Título não pode estar vazio!";
}
if(empty($_POST['data_limite'])){
    $resposta['errors']['err_data'] = "Insira uma data!";
}else if($_POST['data_limite'] <= $data_atual){
    $resposta['errors']['err_data'] = "A data não pode ser anterior ao dia de hoje!!cadast";
}

if(empty($resposta)){
    $resposta['sucesso'] = true;
    $dao = new TaskDAO();
    $task = new Task();
    $task->setTitulo($_POST['titulo']);
    $task->setIdCriador($_SESSION['id_usuario']);
    $task->setdescricao($_POST['descricao']);
    $task->setDataCriacao($data_atual);
    $task->setDataLimite($_POST['data_limite']);
    $dao->inserir_task($task);
    

    echo json_encode(['sucesso' => true,
        'tarefa' => [
            'titulo' => $_POST['titulo'],
            'descricao' => $_POST['descricao'],
            'data_limite' => $_POST['data_limite']
        ]
    ]);
    exit;
}else{
    echo json_encode($resposta);
    exit;
}
?>