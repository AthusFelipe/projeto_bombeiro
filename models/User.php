<?php



class Usuario {

    public int $codfunc;
    public string $nomeguerra;
    public string $cargo;
    public string $nivelAcesso ;  // 1 = PADRÃO; 2 = MODERADOR ; 


    public function carregarUsuario($codfunc, $nomeguerra, $cargo, $nivelAcesso){

        $this->codfunc = $codfunc;
        $this->nomeguerra = $nomeguerra;
        $this->cargo = $cargo;
        $this->nivelAcesso = $nivelAcesso ; 


        
    }
    


    public function logar($id, $senha){

        global $conn;
        $usr = $conn->query("SELECT * FROM usuarios WHERE nomeusuario = '$id' AND senhausuario = '$senha' ")->fetch(PDO::FETCH_OBJ);
       
       

       $this->codfunc = $usr->codfunc;
       $this->nomeguerra = $usr->nomeguerra;
       $this->cargo = $usr->cargo ; 
       $this->nivelAcesso = $usr->nivelacesso ; 

    }

    public function nivelAcesso(int $nivelRequerido){

       
        if($this->nivelAcesso < $nivelRequerido){
            echo "<br><br><div class='container'> <p  style='display:inline;color:darkred;font-weight:bold;'>Você não tem privilégios para acessar esta página.</p><br>
                <p  style='display:inline;color:darkred;font-weight:bold;'>Contate o superior responsável.</p>";
            die();
        }

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
     * Get the value of nomeguerra
     */ 
    public function getNomeguerra()
    {
        return $this->nomeguerra;
    }

    /**
     * Set the value of nomeguerra
     *
     * @return  self
     */ 
    public function setNomeguerra($nomeguerra)
    {
        $this->nomeguerra = $nomeguerra;

        return $this;
    }

    /**
     * Get the value of cargo
     */ 
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Set the value of cargo
     *
     * @return  self
     */ 
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * Get the value of nivelAcesso
     */ 
    public function getNivelAcesso()
    {
        return $this->nivelAcesso;
    }

    /**
     * Set the value of nivelAcesso
     *
     * @return  self
     */ 
    public function setNivelAcesso($nivelAcesso)
    {
        $this->nivelAcesso = $nivelAcesso;

        return $this;
    }
}