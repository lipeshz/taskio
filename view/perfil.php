<?php 
require_once("../model/UsuarioDAO.php");
session_start();
$dao = new UsuarioDAO();
$usuario = $dao->buscarPorEmail($_SESSION['email']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
</head>
    <body>
        <?php 
        echo $usuario['nome'];
        ?>        
    </body>
</html>