<?php


class Servico
{

    private $idservico;
    private $dataservico;
    private $descricaoservico;
    private $horaservico;

    public function criarServico($desc, $data, $hora)
    {
        $this->dataservico = $data;
        $this->descricaoservico = $desc;
        $this->horaservico = $hora;

        $this->cadastrarServicoNoDB();
    }


    private function cadastrarServicoNoDB()
    {
        global $conn;
        $conn->prepare('INSERT INTO servicos (dataservicos, descricaoservicos, horaservicos) 
                        VALUES (?, ?, ?)')
            ->execute([$this->dataservico, $this->descricaoservico, $this->horaservico]);
    }

    public function pesquisaServico($idservico)
    {
        global $conn;
        $s1 =  $conn->query("SELECT * FROM servicos WHERE idservicos = '$idservico'")
            ->fetch(PDO::FETCH_OBJ);


        $this->idservico = $s1->idservicos;
        $this->dataservico = $s1->dataservicos;
        $this->descricaoservico = $s1->descricaoservicos;
        $this->horaservico = $s1->horaservicos;
    }


    static function excluirServico($id)
    {
        global $conn;
        $conn->prepare('DELETE FROM servicos WHERE idservicos = ?')->execute([$id]);
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


    public static function buscaVoluntarioDoMilitar($codfunc)
    {

        global $conn;
        return $conn->query("SELECT * FROM servicosvoluntario WHERE idmilitar = $codfunc ")->fetchAll(PDO::FETCH_OBJ);
    }
}
