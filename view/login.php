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
    <title>Entrar</title>
    <link rel="stylesheet" href="../css/cadastro_usuario.css">
</head>
    <body>
       <form id="formulario-login" method="post">
            <label for="email-usuario">NOME DE USUÁRIO</label>
            <input type="text" name="email" id="email-usuario" value="">
            <span id="err_email"></span>
            <br>
            <label for="senha-usuario">SENHA</label>
            <input type="password" name="senha" id="senha-usuario">
            <span id="err_senha"></span>
            <br>
            <input type="submit" value="ENTRAR">
            <p>Não possui uma conta? <a href="cadastro_usuario.php">Crie uma!</a></p>
       </form> 
        <?php 
            require('../utils/req_footer.php');
        ?>
    </body>
    <script src="../js/AJAX_login.js"></script>
</html>