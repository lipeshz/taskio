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

    public function buscarPorId($id){
        $pdo = Database::getInstance()->getPDO();
        $stmt = $pdo->prepare("SELECT * FROM usuario WHERE id_usuario = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarPorEmail($email){
        $pdo = Database::getInstance()->getPDO();
        $stmt = $pdo->prepare("SELECT * FROM usuario WHERE email = :email");
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizarUsuario($usuario){
        $pdo = Database::getInstance()->getPDO();
        $stmt = $pdo->prepare("UPDATE usuario SET nome = :nome, email = :email WHERE id_usuario = :id");
        $stmt->bindValue(':nome', $usuario['nome']);
        $stmt->bindValue(':email', $usuario['email']);
        $stmt->bindValue(':id', $usuario['id_usuario']);
        $stmt->execute();
    }

    public function atualizarSenha($usuario){
        $pdo = Database::getInstance()->getPDO();
        $stmt = $pdo->prepare("UPDATE usuario SET senha = :senha WHERE id_usuario = :id");
        $stmt->bindValue(':senha', $usuario['senha']);
        $stmt->bindValue(':id', $usuario['id_usuario']);
        $stmt->execute();
    }
    //Delete user
    
}
?>