<?php 
require_once '../database/Database.php';

class Utils{
    public static function token_generation($titulo){
        do{
            $randomBytes = random_bytes(128);
            $token = bin2hex($randomBytes) . md5($titulo);

            $pdo = Database::getInstance()->getPDO();
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM task WHERE token_task = :token");
            $stmt->bindValue(':token', $token);
            $stmt->execute();
            $token_exist = $stmt->fetchColumn() > 0;
        }while($token_exist);
        
    
        return $token;
    }
}
?>