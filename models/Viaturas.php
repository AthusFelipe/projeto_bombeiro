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
    private string $fotoviatura ; 




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


    public function retornaViatura($idvtr){
        global $conn;
        $v1 = $conn->query("SELECT * FROM viaturascadastro, viaturasinformacao WHERE idviaturas = '$idvtr' and idviaturas = idviatura")
        ->fetch(PDO::FETCH_OBJ); 



       $this->modelo = $v1->modelo ;
       $this->placa = $v1->placa;
       $this->fabricante = ($v1->fabricante);
       $this->combustivel = ($v1->combustivel);
       $this->chassi = ($v1->chassi);
       $this->categoria = ($v1->categoria);
       $this->idviatura = ($v1->idviatura);
       $this->nomeviatura = ($v1->nomeviatura);
       $this->status = ($v1->statusviatura);
       $this->fotoviatura = $v1->fotoviatura;






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


    public function status(){
        switch ($this->getStatus()){
            case 1 : $statusVtr = "ATIVO"; break;
            case 0 : $statusVtr = "INATIVO" ; break;
        }
        return $statusVtr ; 
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

    /**
     * Get the value of fotoviatura
     */ 
    public function getFotoviatura()
    {
        return $this->fotoviatura;
    }

    /**
     * Set the value of fotoviatura
     *
     * @return  self
     */ 
    public function setFotoviatura($fotoviatura)
    {
        $this->fotoviatura = $fotoviatura;

        return $this;
    }
}



