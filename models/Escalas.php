<?php



class Escala extends Servico
{

    private $idservicos;
    private $idmilitar;
    private $idservicosescala;





    public function criarEscala($idserv, $idmil)
    {
        $this->idservicos = $idserv;
        $this->idmilitar = $idmil;

        $this->escalaMilitar();
    }


    public function consultar($idservescala, $idserv, $idmil)
    {
        $this->idservicosescala = $idservescala;
        $this->idservicos = $idserv;
        $this->idmilitar1 = $idmil;
    }


    public function escalaMilitar()
    {
        global $conn;
        $conn->prepare('INSERT INTO servicosescala ( idservicos, idmilitar1) VALUES (?, ?) ')
            ->execute([$this->getIdservicos(), $this->getIdmilitar()]);
    }

    public static function removeMilitar($iservicoescala)
    {
        global $conn;
        $conn->prepare('DELETE FROM servicosescala WHERE iservicosescala = ?')->execute([$iservicoescala]);
    }





    /**
     * Get the value of idservicos
     */
    public function getIdservicos()
    {
        return $this->idservicos;
    }

    /**
     * Get the value of idmilitar1
     */


    /**
     * Get the value of idservicosescala
     */
    public function getIdservicosescala()
    {
        return $this->idservicosescala;
    }

    /**
     * Get the value of idmilitar
     */
    public function getIdmilitar()
    {
        return $this->idmilitar;
    }
}
