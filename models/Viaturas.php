<?php


class Viatura
{

    public string $idviatura;
    private string $nomeviatura;
    private int $status;
    private string $modelo;
    private string $placa;
    private string $fabricante;
    private string $combustivel;
    private string $chassi;
    private string $categoria;




    public function cadastrarViatura($name)
    {
        $this->nomeviatura = $name;
        $this->status = 1;

        /*STATUS : 
        * 1 PARA "OPERACIONAL"
        * 2 PARA "DESATIVADA"
        * 0 PARA "BAIXADA"
        */
    }


    public function informacoes($modelo, $placa, $marca, $comb, $chassi, $cat)
    {
        $this->modelo = $modelo;
        $this->placa = $placa;
        $this->fabricante = $marca;
        $this->combustivel = $comb;
        $this->chassi = $chassi;
        $this->categoria = $cat;
    }

    /**
     * Get the value of idviatura
     */
    public function getIdviatura()
    {
        return $this->idviatura;
    }

    /**
     * Get the value of nomeviatura
     */
    public function getNomeviatura()
    {
        return $this->nomeviatura;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of nomeviatura
     *
     * @return  self
     */
    public function setNomeviatura($nomeviatura)
    {
        $this->nomeviatura = $nomeviatura;

        return $this;
    }

    /**
     * Set the value of idviatura
     *
     * @return  self
     */
    public function setIdviatura($idviatura)
    {
        $this->idviatura = $idviatura;

        return $this;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of modelo
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set the value of modelo
     *
     * @return  self
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get the value of marca
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set the value of marca
     *
     * @return  self
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

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
     * Get the value of placa
     */
    public function getPlaca()
    {
        return $this->placa;
    }

    /**
     * Set the value of placa
     *
     * @return  self
     */
    public function setPlaca($placa)
    {
        $this->placa = $placa;

        return $this;
    }

    /**
     * Get the value of chassi
     */
    public function getChassi()
    {
        return $this->chassi;
    }

    /**
     * Set the value of chassi
     *
     * @return  self
     */
    public function setChassi($chassi)
    {
        $this->chassi = $chassi;

        return $this;
    }

    /**
     * Get the value of categoria
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set the value of categoria
     *
     * @return  self
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get the value of fabricante
     */
    public function getFabricante()
    {
        return $this->fabricante;
    }

    /**
     * Set the value of fabricante
     *
     * @return  self
     */
    public function setFabricante($fabricante)
    {
        $this->fabricante = $fabricante;

        return $this;
    }
}



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

    public function __construct($idviat, $post, $cod, $comb, $val, $odo, $not, $sta)
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
