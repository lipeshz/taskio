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
       <form action="../controller/login.php" method="post">
            <label for="email-usuario">NOME DE USUÁRIO</label>
            <input type="text" name="email" id="email-usuario" value="">
            <?php 
            if(isset($_SESSION['email_err_login'])){
                echo  '<span class="error">' . $_SESSION['email_err_login'] . '</span>';
                unset($_SESSION['email_err_login']);
            }
            ?>
            <br>
            <label for="senha-usuario">SENHA</label>
            <input type="password" name="senha" id="senha-usuario">
            <?php 
            if(isset($_SESSION['senha_err_login'])){
                echo '<span class="error">' . $_SESSION['senha_err_login'] . '</span>';
                unset($_SESSION['senha_err_login']);
            }
            ?>
            <p>Não possui uma conta? <a href="cadastro.php">Crie uma!</a></p>
            <br>
            <input type="submit" value="ENTRAR">
       </form> 
    </body>
</html>