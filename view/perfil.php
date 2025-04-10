<?php 
require_once("../model/UsuarioDAO.php");
session_start();

if(!isset($_SESSION['id_usuario'])){
    header('../view/login.php');
}else{
    $dao = new UsuarioDAO();
    $usuario = $dao->buscarPorEmail($_SESSION['email']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
</head>
    <body>
        <form action="" id="form-edit-user">
            <label for="nome-usuario">Nome:</label>
            <input type="text" name="name" id="user-name">
            <br>
            <span id="err-nome"></span>
            <br>
            <label for="email-usuario">E-Mail:</label>
            <input type="email" name="email" id="user-email">
            <br>
            <span id="err-email"></span>
            <br>
            <input type="submit" value="SALVAR">
        </form> 
        <br>
        <br>
        <form action="" id="form-edit-password">
            <label for="senha-usuario">Senha:</label>
            <input type="password" name="password" id="user-password">
            <br>
            <br>
            <label for="confirm-user-password">Confirmar senha:</label>
            <input type="password" name="confirm_password" id="confirm-user-password">
            <br>
            <span id="err-senha"></span>
            <br>
            <input type="submit" value="CONFIRMAR">
        </form>

        <script src="../js/perfil.js"></script>
    </body>
</html>