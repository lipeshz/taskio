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
        <form action="../controller/cadastro_usuario.php" method="post">
            <label for="nome-usuario">NOME DE USUÁRIO</label>
            <input type="text" name="nome" id="nome-usuario" value="<?php echo $_SESSION['nome_err'] ?? ''; ?>">
            <?php 
            if(isset($_SESSION['err_nome'])) {
                echo '<span class="error">' . $_SESSION['err_nome'] . '</span>';
                unset($_SESSION['err_nome']);
            }
            ?>

            <br>
            <label for="email-usuario">E-MAIL</label>
            <input type="email" name="email" id="email-usuario" value="<?php echo $_SESSION['email_err'] ?? ''; ?>">
            <?php 
            if(isset($_SESSION['err_email'])){
                echo '<span class="error">' . $_SESSION['err_email'] . '</span>';
                unset($_SESSION['err_email']);
            }
            ?>

            <br>
            <br>
            <label for="senha-usuario">SENHA</label>
            <input type="password" name="senha" id="senha-usuario">
            <br>
            <label for="confirmar-senha">CONFIRMAR SENHA</label>
            <input type="password" name="conf_senha" id="confirmar_senha">
            <br>
            <?php 
            if(isset($_SESSION['err_senha'])){
                echo '<span class="error">' . $_SESSION['err_senha'] . '</span>';
                unset($_SESSION['err_senha']);
            }
            ?>
            
            <br>
            <input type="submit" value="CADASTRAR">
        </form>
    </body>
</html>