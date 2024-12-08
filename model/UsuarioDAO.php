<?php 
require_once('UsuarioDTO.php');
require_once('../database/Database.php');

class UsuarioDAO{
    public function inserir($usuario){
        $pdo = Database::getInstance()->getPDO();
        $stmt = $pdo->prepare("INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)");
        $stmt->bindValue(':nome', $usuario->getNome());
        $stmt->bindValue(':email', $usuario->getEmail());
        $stmt->bindValue(':senha', $usuario->getSenha());
        $stmt->execute();
        return $pdo->lastInsertId();
    }
}
?>