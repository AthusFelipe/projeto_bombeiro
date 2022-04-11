<?php



class Escala extends Servico
{

    private $idservicos;
    private $idmilitar;
    private $idservicosescala;



    public function __construct($idserv, $idmil)
    {
        $this->idservicos = $idserv;
        $this->idmilitar = $idmil;
    }


    public function consultar($idservescala, $idserv, $idmil)
    {
        $this->idservicosescala = $idservescala;
        $this->idservicos = $idserv;
        $this->idmilitar1 = $idmil;
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
