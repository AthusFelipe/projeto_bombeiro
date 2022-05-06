<?php


class Deslocamento
{
    public int $iddeslocamento;
    public int $idviatura;
    private int $kminicial;
    private int $kmfinal;
    private  $horainicial;
    private  $horafinal;
    private string $destino;
    private int $codfuncMotorista;
    private int $criadopor; //id do criador do deslocamento 


    public function novoDeslocamento($idvtr, $kminicial, $motorista, $criador, $destino)
    {
        $this->idviatura = $idvtr;
        $this->kminicial = $kminicial;
        $this->codfuncMotorista = $motorista;
        $this->criadopor = $criador;
        $this->horainicial = date('H:i:s');
        $this->destino = $destino;


        global $conn;
        $conn->prepare('INSERT INTO viaturasdeslocamento (idviatura, kminicial, codfuncmotorista, codfunccriador, horainicial, destino)
                            VALUES (?, ?, ?, ?, ?, ?)')
            ->execute([$this->idviatura, $this->kminicial, $this->codfuncMotorista, $this->criadopor, $this->horainicial, $this->destino]);
    }


    public function consultarDeslocamento($iddeslocamento)
    {
        global $conn;
        $d1 = $conn->query("SELECT * FROM viaturasdeslocamento WHERE iddeslocamento = $iddeslocamento")->fetch(PDO::FETCH_OBJ);


        $this->iddeslocamento = $d1->iddeslocamento;
        $this->idviatura = $d1->idviatura;
        $this->codfuncMotorista = $d1->codfuncmotorista;
        $this->criadopor = $d1->codfunccriador;
        $this->destino = $d1->destino;
        $this->kminicial  = $d1->kminicial;
        $this->kmfinal = $d1->kmfinal;
        $this->horainicial = $d1->horainicial;
        $this->horafinal = $d1->horafinal;
    }



    public function salvarDeslocamento()
    {
        global $conn;
        $conn->query("UPDATE viaturasdeslocamento SET
        kmfinal = '$this->kmfinal', horafinal = '$this->horafinal'  WHERE iddeslocamento = $this->iddeslocamento");
    }




    public function getIddeslocamento()
    {
        return $this->iddeslocamento;
    }

    /**
     * Set the value of iddeslocamento
     *
     * @return  self
     */
    public function setIddeslocamento($iddeslocamento)
    {
        $this->iddeslocamento = $iddeslocamento;

        return $this;
    }

    /**
     * Get the value of idviatura
     */
    public function getIdviatura()
    {
        return $this->idviatura;
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
     * Get the value of kminicial
     */
    public function getKminicial()
    {
        return $this->kminicial;
    }

    /**
     * Set the value of kminicial
     *
     * @return  self
     */
    public function setKminicial($kminicial)
    {
        $this->kminicial = $kminicial;

        return $this;
    }

    /**
     * Get the value of kmfinal
     */
    public function getKmfinal()
    {
        return $this->kmfinal;
    }

    /**
     * Set the value of kmfinal
     *
     * @return  self
     */
    public function setKmfinal($kmfinal)
    {
        $this->kmfinal = $kmfinal;

        return $this;
    }

    /**
     * Get the value of horainicial
     */
    public function getHorainicial()
    {
        return $this->horainicial;
    }

    /**
     * Set the value of horainicial
     *
     * @return  self
     */
    public function setHorainicial($horainicial)
    {
        $this->horainicial = $horainicial;

        return $this;
    }

    /**
     * Get the value of horafinal
     */
    public function getHorafinal()
    {
        return $this->horafinal;
    }

    /**
     * Set the value of horafinal
     *
     * @return  self
     */
    public function setHorafinal($horafinal)
    {
        $this->horafinal = $horafinal;

        return $this;
    }

    /**
     * Get the value of destino
     */
    public function getDestino()
    {
        return $this->destino;
    }

    /**
     * Set the value of destino
     *
     * @return  self
     */
    public function setDestino($destino)
    {
        $this->destino = $destino;

        return $this;
    }

    /**
     * Get the value of codfuncMotorista
     */
    public function getCodfuncMotorista()
    {
        return $this->codfuncMotorista;
    }

    /**
     * Set the value of codfuncMotorista
     *
     * @return  self
     */
    public function setCodfuncMotorista($codfuncMotorista)
    {
        $this->codfuncMotorista = $codfuncMotorista;

        return $this;
    }

    /**
     * Get the value of criadopor
     */
    public function getCriadopor()
    {
        return $this->criadopor;
    }

    /**
     * Set the value of criadopor
     *
     * @return  self
     */
    public function setCriadopor($criadopor)
    {
        $this->criadopor = $criadopor;

        return $this;
    }
}
