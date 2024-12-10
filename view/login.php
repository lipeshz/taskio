<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
</head>
    <body>
       <form action="../controller/login.php" method="post">
            <label for="email-usuario">NOME DE USUÁRIO</label>
            <input type="text" name="email" id="email-usuario" value="">
            <?php 
            if(isset($_SESSION['email_inexistente'])){
                echo $_SESSION['email_inexistente'];
                unset($_SESSION['email_inexistente']);
            }
            ?>
            <br>
            <label for="senha-usuario">SENHA</label>
            <input type="password" name="senha" id="senha-usuario">
            <?php 
            if(isset($_SESSION['login_err'])){
                echo $_SESSION['login_err'];
                unset($_SESSION['login_err']);
            }
            ?>
            <br>
            <input type="submit" value="ENTRAR">
       </form> 
    </body>
</html>