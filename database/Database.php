<?php 
class Database{
    private static $intance;
    private $pdo;

    private function __construct(){
        $this->pdo = new PDO('mysql:host=localhost;dbname=taskio', '', '');
    }

    public static function getInstance(){
        if(!self::$intance){
            self::$intance = new self();
        }
        return self::$intance;
    }

    public function getPDO(){
        return $this->pdo;
    }
}
?>