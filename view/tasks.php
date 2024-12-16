<?php
require_once('../model/TaskDAO.php');
session_start();
if(!isset($_SESSION['id_usuario'])){
    header('../view/login.php');
}else{
    $dao = new TaskDAO();
    $task = $dao->buscarPorCriador($_SESSION['id_usuario']);
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suas tarefas</title>
</head>
    <body>
        <a href="cadastro_tasks.php"><button>ADICIONAR +</button></a>
        <?php 
        if($task == []){
           echo '<h1 style="text-align:center;">Você não tem tarefas!</h1>';
        }else{
            foreach($task as $tasks){
                
            }
        }
        ?>
    </body>
</html>