<?php


class Servico {

    private $idservico;
    private $dataservico ; 
    private $descricaoservico ; 
    private $horaservico ; 

    public function __construct($desc, $data, $hora){
        $this->dataservico = $data;
        $this->descricaoservico = $desc ; 
        $this->horaservico = $hora; 
    }

    public function pesquisa($id, $data, $desc){
        $this->idservico = $id;
        $this->dataservico = $data;
        $this->descricaoservico = $desc ; 
    }

    /**
     * Get the value of descricaoservico
     */ 
    public function getDescricaoservico()
    {
        return $this->descricaoservico;
    }

    /**
     * Get the value of dataservico
     */ 
    public function getDataservico()
    {
        return $this->dataservico;
    }

    /**
     * Get the value of idservico
     */ 
    public function getIdservico()
    {
        return $this->idservico;
    }

    /**
     * Get the value of horaservico
     */ 
    public function getHoraservico()
    {
        return $this->horaservico;
    }
}





