<?php
require '../model/UsuarioDAO.php';
session_start();
$usuario = new Usuario();
$dao = new UsuarioDAO();

$usuario->setNome($_POST['nome']);
$usuario->setEmail($_POST['email']);

?>