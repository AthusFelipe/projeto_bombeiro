<?php

class Abastecimento
{

    public $idviatura;
    private $posto;
    public $codfunc;
    private $combustivel;
    private $valor;
    private $odometro;
    private $notafiscal;
    private $statuspg;
    private $dataabastecimento ;
    public function novoAbastecimento($idviat, $post, $cod, $comb, $val, $odo, $not, $sta)
    {

        $this->idviatura = $idviat;
        $this->posto = $post;
        $this->codfunc = $cod;
        $this->combustivel = $comb;
        $this->valor = $val;
        $this->odometro = $odo;
        $this->notafiscal = $not;
        $this->statuspg = $sta;
    }




    /**
     * Get the value of idviatura
     */
    public function getIdviatura()
    {
        return $this->idviatura;
    }

    /**
     * Get the value of posto
     */
    public function getPosto()
    {
        return $this->posto;
    }

    /**
     * Set the value of posto
     *
     * @return  self
     */
    public function setPosto($posto)
    {
        $this->posto = $posto;

        return $this;
    }

    /**
     * Get the value of codfunc
     */
    public function getCodfunc()
    {
        return $this->codfunc;
    }

    /**
     * Set the value of codfunc
     *
     * @return  self
     */
    public function setCodfunc($codfunc)
    {
        $this->codfunc = $codfunc;

        return $this;
    }

    /**
     * Get the value of combustivel
     */
    public function getCombustivel()
    {
        return $this->combustivel;
    }

    /**
     * Set the value of combustivel
     *
     * @return  self
     */
    public function setCombustivel($combustivel)
    {
        $this->combustivel = $combustivel;

        return $this;
    }

    /**
     * Get the value of valor
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set the value of valor
     *
     * @return  self
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get the value of odometro
     */
    public function getOdometro()
    {
        return $this->odometro;
    }

    /**
     * Set the value of odometro
     *
     * @return  self
     */
    public function setOdometro($odometro)
    {
        $this->odometro = $odometro;

        return $this;
    }

    /**
     * Get the value of notafiscal
     */
    public function getNotafiscal()
    {
        return $this->notafiscal;
    }

    /**
     * Set the value of notafiscal
     *
     * @return  self
     */
    public function setNotafiscal($notafiscal)
    {
        $this->notafiscal = $notafiscal;

        return $this;
    }

    /**
     * Get the value of statuspg
     */
    public function getStatuspg()
    {
        return $this->statuspg;
    }

    /**
     * Set the value of statuspg
     *
     * @return  self
     */
    public function setStatuspg($statuspg)
    {
        $this->statuspg = $statuspg;

        return $this;
    }
}
