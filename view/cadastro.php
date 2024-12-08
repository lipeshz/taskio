<?php 

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
</head>
    <body>
        <form action="../controller/cadastro_usuario.php" method="post">
            <label for="nome-usuario">NOME DE USUÁRIO</label>
            <input type="text" name="nome" id="nome-usuario">
            <br>
            <label for="email-usuario">E-MAIL</label>
            <input type="email" name="email" id="email-usuario">
            <br>
            <label for="senha-usuario">SENHA</label>
            <input type="password" name="senha" id="senha-usuario">
            <br>
            <label for="confirmar-senha">CONFIRMAR SENHA</label>
            <input type="password" name="conf_senha" id="confirmar_senha">
            <br>
            <input type="submit" value="CADASTRAR">
        </form>
    </body>
</html>