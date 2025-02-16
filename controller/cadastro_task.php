<?php 
require_once('../model/TaskDAO.php');
session_start();

$resposta = [];
$data_atual = $_POST['data_atual'];
$caminho = $_POST['caminho'];

if(empty($_POST['titulo'])){
    $resposta['errors']['err_titulo'] = "Título não pode estar vazio!";
}
if(empty($_POST['data_limite'])){
    $resposta['errors']['err_data'] = "Insira uma data!";
}else if($_POST['data_limite'] <= $data_atual){
    $resposta['errors']['err_data'] = "A data não pode ser anterior ao dia de hoje!";
}

if(empty($resposta)){
    $task = new Task();
    $dao = new TaskDAO();
    $resposta['sucesso'] = true;
    if($caminho == 'cadastro'){
        
        $task->setTitulo($_POST['titulo']);
        $task->setIdCriador($_SESSION['id_usuario']);
        $task->setdescricao($_POST['descricao']);
        $task->setDataCriacao($data_atual);
        $task->setDataLimite($_POST['data_limite']);
        $dao->inserir_task($task);

        echo json_encode(['sucesso_cadastro' => true,
            'tarefa' => [
                'titulo' => $_POST['titulo'],
                'descricao' => $_POST['descricao'],
                'data_limite' => $_POST['data_limite']
            ]
        ]);
        exit;
    }else if($_POST['caminho'] == 'update'){

        if($_POST['titulo'] != $task->getTitulo()){
            $task->setTitulo($_POST['titulo']);
        }

        if($_POST['descricao'] != $task->getDescricao()){
            $task->setDescricao($_POST['descricao']);
        }

        if($_POST['data_limite'] != $task->getDataLimite()){
            $task->setDataLimite($_POST['data_limite']);
        }

        $task->setToken($_POST['token']);

        $dao->editar($task);

        echo json_encode(['sucesso_update' => true,
            'tarefa' => [
                'titulo' => $task->getTitulo(),
                'descricao' => $task->getDescricao(),
                'data_limite' => $task->getDataLimite(),
                'token' => $_POST['token']
            ]
            ]);
            
        exit;
    }
    
}else{
    echo json_encode($resposta);
    exit;
}
?>