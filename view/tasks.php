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
       <button id="button-modal-open">ADICIONAR +</button>
       <dialog id="dialog-modal" aria-modal="true" role="dialog">
            <button id="button-modal-close">X</button>
            <form action="../controller/cadastro_task.php" method="post">
                <label for="titulo-task">TÍTULO</label>
                <input type="text" name="titulo" id="titulo-task">
                <br>
                <br>
                <label for="descricao-task">DESCRIÇÃO</label>
                <input type="text" name="descricao" id="descricao-task">
                <br>
                <br>
                <label for="data-limite">DATA LIMITE</label>
                <input type="date" name="data_limite" id="data-limite">
                <br>
                <br>
                <input type="submit" value="CRIAR">
            </form>
         </dialog>
        <?php 
        if($task == []){
           echo '<h1 style="text-align:center;">Você não tem tarefas!</h1>';
        }else{
            foreach($task as $tasks){
                echo $tasks['titulo'];
            }
        }
        ?>
        <script src="../js/open_modal.js"></script>
    </body>
</html>