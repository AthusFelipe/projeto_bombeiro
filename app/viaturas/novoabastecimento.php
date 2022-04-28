<?php

include "Controllers/Abastecimento.controller.php";

include "./../login.php";
include "./../../style/header.html";

$usuarioLogado->nivelAcesso(2);
?>



<!DOCTYPE html>

<body>
    <div class='container'>
        <h3>NOVO ABASTECIMENTO</h3>


        <form method='post'>

            <input name='codfunc' type='text' value='<?= $usuarioLogado->getCodfunc(); ?>' hidden>
            <div class='items-formulario'>


                <div class='item-formulario'>


                    <select class='w3-select w3-border' name="idviatura">
                        <option value="" disabled selected>VIATURA</option>

                        <?= $selectViaturas; ?>
                    </select>
                </div>


                <div class='item-formulario'>

                    <label for='posto'></label>Posto</label> <input type='text' name='posto'>

                </div>
                <div class='item-formulario'>

                    <select class="w3-select W3-border" name='combustivel'>
                        <option value="" disabled selected>COMBUSTIVEL</option>
                        <option value='Diesel S10'>Diesel S-10</option>
                        <option value='Gasolina'>Gasolina</option>
                        <option value='Etanol'>Etanol</option>
                        <option value='Diesel'>Diesel</option>


                    </select>

                </div>
                <div class='item-formulario'>

                    <label for='valor'>Valor</label> <input type='text' name='valor'>
                </div>
                <div class='item-formulario'>

                    <label for='odometro'>Odometro </label><input type='number' name='odometro'>
                </div>
                <div class='item-formulario'>

                    <label for='notafiscal'>Nota fiscal</label> <input type='text' name='notafiscal'>
                </div>
                <div class='item-formulario'>


                    <select class="w3-select W3-border" name='status'>
                        <option value="" disabled selected>STATUS DA NOTA</option>
                        <option value='1'>PAGO</option>
                        <option value='0'>PENDENTE</option>
                    </select>
                </div>
                <div class='div-botao-criar'>

                    <input class='   botao-criar' type='submit' value='CADASTRAR'>
                </div>
            </div>
        </form>
    </div>

</body>

</html>