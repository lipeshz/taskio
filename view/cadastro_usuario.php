<?php
session_start(); 
if(isset($_SESSION['id_usuario'])){
    header('Location:../view/index.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastro_usuario.css">
    <title>Cadastrar</title>
</head>
    <body>
        <form id="formulario-cadastro" method="post">
            <label for="nome-usuario">NOME DE USUÁRIO</label>
            <input type="text" name="nome" id="nome-usuario">
            <span id="err_nome"></span>
            <br>

            <label for="email-usuario">E-MAIL</label>
            <input type="email" name="email" id="email-usuario">
            <span id="err_email"></span>
            <br>
            <br>
            <label for="senha-usuario">SENHA</label>
            <input type="password" name="senha" id="senha-usuario">
            <br>
            <br>
            <label for="confirmar-senha-usuario">CONFIRMAR SENHA</label>
            <input type="password" name="conf_senha" id="confirmar-senha-usuario">
            <br>
            <span id="err_senha"></span>
            <br>
            <input type="submit" value="CADASTRAR">
            <br><br>
            <p>Já possui uma conta? <a href="login.php">Entre!</a></p>
            
        </form>
    </body>
    <script src="../js/AJAX_cadastro_usuario.js"></script>
</html>