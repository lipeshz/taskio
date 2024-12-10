<?php 
require('../model/UsuarioDAO.php');
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task.io</title>
</head>
<body>
    <a href="cadastro.php">CADASTRO</a>
    <a href="login.php">ENTRAR</a>
    <?php 
    // echo "<h1>Bem-vindo," . $usuario->getNome();
    // echo "</h1>";
    // echo "<h1>E-Mail:" . $usuario->getEmail();
    // echo "</h1>";
    // echo "<h1>Senha:" . $usuario->getSenha();
    // echo "</h1>";
    // echo "<h1>ID:" . $usuario->getIdUsuario();
    // echo "</h1>";
    ?>
</body>
</html>