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
       <button id="conta-usuario">CONTA</button>
       <br>
       <dialog id="dialog-modal" aria-modal="true" role="dialog">
            <button id="button-modal-close">X</button>
            <form id="form-cadastro-task" method="post">
                <label for="titulo-task">TÍTULO</label>
                <input type="text" name="titulo" id="titulo-task">
                <br>
                <span id="err_titulo"></span>
                <br>
                <br>
                <label for="descricao-task">DESCRIÇÃO</label>
                <input type="text" name="descricao" id="descricao-task">
                <br>
                <br>
                <label for="data-limite">DATA LIMITE</label>
                <input type="datetime-local" name="data_limite" id="data-limite">
                <br>
                <span id="err_data"></span>
                <br>
                <br>
                <input type="submit" value="CRIAR" id="criar">
            </form>
         </dialog>
         <div id="tasks">

         </div>
        <script src="../js/open_modal.js"></script>
        <script src="../js/AJAX_cadastro_task.js"></script>
    </body>
</html>