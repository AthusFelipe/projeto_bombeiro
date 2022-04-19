<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include "controller.php";

if (isset($_POST['nomeviatura'])) {

    $ext = strtolower(substr($_FILES['fotoviatura']['name'], -4));
    $nameimg = date("Y.m.d-H.i.s") . $ext;
    $dir = './imagensviatura/';
    move_uploaded_file($_FILES['fotoviatura']['tmp_name'], $dir . $nameimg);

    $idFotoViatura = $dir . $nameimg;

    $v1 = new Viatura;

    $v1->cadastrarViatura($_POST['nomeviatura']);
    $v1->informacoes($_POST['modeloviatura'], $_POST['placaviatura'], $_POST['marcaviatura'], $_POST['combustivel'], $_POST['chassiviatura'], $_POST['categoriaviatura']);





    $conn->prepare('INSERT INTO viaturascadastro (nomeviatura, statusviatura, fotoviatura) VALUES (?, ?, ?)')
        ->execute([$v1->getNomeviatura(), $v1->getStatus(), $idFotoViatura]);

    $v1->setIdviatura($conn->lastInsertId());


    $conn->prepare('INSERT INTO viaturasinformacao VALUES (?, ?, ?, ?, ?, ?, ?)')
        ->execute([$v1->getIdviatura(), $v1->getModelo(), $v1->getPlaca(), $v1->getFabricante(), $v1->getCombustivel(), $v1->getChassi(), $v1->getCategoria()]);


    echo '<pre>';
    print_r($v1);
    echo '</pre>';
}



?>






<!DOCTYPE html>
<form method='post' action='' enctype='multipart/form-data'>
    <label for='nomeviatura'>Identificação da viatura: </label>
    <input type='text' name='nomeviatura' required><br><br>
    <label for='fotoviatura'> Foto da viatura:</label>
    <input type='file' accept='imagensviatura/*' name='fotoviatura'><br><br>
    <label for='modeloviatura'>Modelo: </label>
    <input type='text' name='modeloviatura'><br><br>
    <label for='placaviatura'>Placa: </label>
    <input type='text' name='placaviatura'><br><br>
    <label for='marcaviatura'>Fabricante: </label>
    <input type='text' name='marcaviatura'><br><br>
    <label for='combustivel'>Combustivel</label>
    <input type='text' name='combustivel'><br><br>
    <label for='chassi'> Chassi:</label>
    <input type='text' name='chassiviatura'>
    <label for='categoriaviatura'> Categoria</label>
    <input type='text' name='categoriaviatura'><br><br>
    <input type='submit' value='cadastrar'><br>


</form>



</html>