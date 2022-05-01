<?php

namespace ControleAcesso;

class Acesso {
    public int $autenticado;
    public int $nivelAcesso;


    public function nivel($nivelrequerido){

        if($this->nivelAcesso <= $nivelrequerido) {
            echo "Você não pode acessar essa página";
            die();
        }
    }



}