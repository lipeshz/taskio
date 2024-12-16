<?php
require_once '../database/Database.php';
require_once 'taskDTO.php';

class TaskDAO{
    public function inserir_task($task){
        $pdo = Database::getInstance()->getPDO();
        $stmt = $pdo->prepare("INSERT INTO task (titulo, id_criador, descricao, data_criacao, data_limite) VALUES (:titulo, :id_criador, :descricao, :data_criacao, :data_limite)");
        $stmt->bindValue(':titulo', $task->getTitulo());
        $stmt->bindValue(':id_criador', $task->getIdCriador());
        $stmt->bindValue(':descricao', $task->getDescricao());
        $stmt->bindValue(':data_criacao', $task->getDataCriacao());
        $stmt->bindValue(':data_limite', $task->getDataLimite());
        $stmt->execute();
        return $pdo->lastInsertId();
    }

    public function buscarPorCriador($id_usuario){
        $pdo = Database::getInstance()->getPDO();
        $stmt = $pdo->prepare("SELECT * FROM task WHERE id_criador = :id_criador");
        $stmt->bindValue(':id_criador', $id_usuario);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>