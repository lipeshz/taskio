<?php 
require_once('UsuarioDTO.php');
require_once('../database/Database.php');

class UsuarioDAO{
    public function inserir($usuario){
        $pdo = Database::getInstance()->getPDO();
    }
}
?>