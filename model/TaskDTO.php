<?php 
class Task{
    private $id_task;
    private $nome_criador;
    private $descricao;
    private $data_criacao;
    private $data_limite;

    public function setId_task($id_task){
        $this->id_task = $id_task;
    }

    public function getId_task(){
        return $this->id_task;
    }

    public function setNomeCriador($nome_criador){
        $this->nome_criador = $nome_criador;
    }

    public function getNomeCriador(){
        return $this->nome_criador;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDataCriacao($data_criacao){
        $this->data_criacao = $data_criacao;
    }

    public function getDataCriacao(){
        return $this->data_criacao;
    }

    public function setDataLimite($data_limite){
        $this->data_limite = $data_limite;
    }

    public function getDataLimite(){
        return $this->data_limite;
    }
}
?>