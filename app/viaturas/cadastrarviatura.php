<?php


include "./Controllers/CadastrarViatura.controller.php";


include "./../../style/header.html";

?>






<!DOCTYPE html>

<body>

    <div class='container'>
        <h3>CADASTRAR NOVA VIATURA</h3>



        <form method='post' action='' enctype='multipart/form-data'>
            <div class='items-formulario'>

                <div class='item-formulario'>
                    <label for='nomeviatura'>Identificação da viatura: </label>
                    <input type='text' name='nomeviatura' required>
                </div>

                <div class='item-formulario'>

                    <label for='fotoviatura'> Foto da viatura:</label>
                    <input type='file' accept='imagensviatura/*' name='fotoviatura'>

                </div>

                <div class='item-formulario'>

                    <label for='modeloviatura'>Modelo: </label>
                    <input type='text' name='modeloviatura'>


                </div>

                <div class='item-formulario'>

                    <label for='placaviatura'>Placa: </label>
                    <input type='text' name='placaviatura'>

                </div>


                <div class='item-formulario'>

                    <label for='marcaviatura'>Fabricante: </label>
                    <input type='text' name='marcaviatura'>

                </div>

                <div class='item-formulario'>

                    <label for='combustivel'>Combustivel</label>
                    <input type='text' name='combustivel'>
                </div>

                <div class='item-formulario'>

                    <label for='chassi'> Chassi:</label>
                    <input type='text' name='chassiviatura'>
                </div>

                <div class='item-formulario'>

                    <label for='categoriaviatura'> Categoria</label>
                    <input type='text' name='categoriaviatura'>
                    <div class='item-formulario'>
                        <div class='div-botao-criar'>
                            <input class='   botao-criar' class='botao-criar' type='submit' value='CADASTRAR'><br>
                        </div>
                    </div>

                </div>
        </form>
    </div>

</body>

</html>