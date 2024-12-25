<?php 
require('../model/UsuarioDAO.php');
session_start();
$dao = new UsuarioDAO();
if(isset($_SESSION['id_usuario'])){
    header('Location:../view/tasks.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task.io</title>
</head>
<body>
    <a href="cadastro_usuario.php">CADASTRO</a>
    <a href="login.php">ENTRAR</a>
</body>
</html>