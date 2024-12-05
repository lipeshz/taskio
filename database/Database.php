<?php 
class Database{
    private static $instance;
    private $pdo;

    private function __construct(){
        $this->pdo = new PDO('mysql:host=localhost;dbname=taskio', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getPDO(){
        return $this->pdo;
    }
}
?>