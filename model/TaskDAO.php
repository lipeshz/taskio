<?php
require_once '../database/Database.php';
require_once '../utils/utils.php';
require_once 'taskDTO.php';

class TaskDAO{
    public function inserir_task($task){
        $pdo = Database::getInstance()->getPDO();
        $stmt = $pdo->prepare("INSERT INTO task (token_task, titulo, id_criador, descricao, data_criacao, data_limite) VALUES (:token_task, :titulo, :id_criador, :descricao, :data_criacao, :data_limite)");
        $stmt->bindValue(':token_task', Utils::token_generation($task->getTitulo()));
        $stmt->bindValue(':titulo', $task->getTitulo());
        $stmt->bindValue(':id_criador', $task->getIdCriador());
        $stmt->bindValue(':descricao', $task->getDescricao());
        $stmt->bindValue(':data_criacao', $task->getDataCriacao());
        $stmt->bindValue(':data_limite', $task->getDataLimite());
        $stmt->execute();
        return $pdo->lastInsertId();
    }
    
    public function excluir($token){
        $pdo = Database::getInstance()->getPDO();
        $stmt = $pdo->prepare("DELETE FROM task WHERE token_task = :token");
        $stmt->bindValue(':token', $token);
        $stmt->execute();
    }

    public function editar($task){
        $pdo = Database::getInstance()->getPDO();
        $stmt = $pdo->prepare("UPDATE task SET titulo = :titulo, descricao = :descricao, data_limite = :data_limite WHERE token_task = :token");
        $stmt->bindValue(':titulo', $task->getTitulo());
        $stmt->bindValue(':descricao', $task->getDescricao());
        $stmt->bindValue(':data_limite', $task->getDataLimite());
        $stmt->bindValue(':token', $task->getToken());
        $stmt->execute();
    }

    public function buscarPorCriador($id_usuario){
        $pdo = Database::getInstance()->getPDO();
        $stmt = $pdo->prepare("SELECT * FROM task WHERE id_criador = :id_criador");
        $stmt->bindValue(':id_criador', $id_usuario);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorToken($token){
        $pdo = Database::getInstance()->getPDO();
        $stmt = $pdo->prepare("SELECT * FROM task WHERE token_task = :token");
        $stmt->bindValue(':token', $token);
        $stmt->execute();

        $taskData = $stmt->fetch(PDO::FETCH_ASSOC);
        if($taskData){
            $task = new Task();
            $task->setTitulo($taskData['titulo']);
            $task->setDescricao($taskData['descricao']);
            $task->setDataLimite($taskData['data_limite']);
            $task->setToken($taskData['token_task']);
            return $task;
        }
    }

}
?>